<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Orders;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;

class CartController extends Controller
{
    public function add_cart(Request $request)
    {
        $product_id = $request->product_id;

        // Nếu giỏ hàng chưa có -> tạo mới với sản phẩm duy nhất và số lượng mặc định là 1
        if (is_null(Session::get('cart'))) {
            Session::put('cart', [
                $product_id => 1
            ]);
            return redirect('/cart');
        } else {
            $cart = Session::get('cart');

            // Nếu giỏ hàng đã có sản phẩm khác thì xóa sản phẩm cũ và thêm sản phẩm mới
            if (count($cart) >= 1) {
                // Xóa tất cả sản phẩm trong giỏ hàng
                $cart = [];
            }

            // Thêm sản phẩm mới vào giỏ hàng với số lượng là 1
            $cart[$product_id] = 1;
            Session::put('cart', $cart);

            return redirect('/cart');
        }
    }



    public function show_cart()
    {
        // dd(Session::get('cart'));
        // Lấy giỏ hàng từ session
        $cart = Session::get('cart');

        // Kiểm tra nếu giỏ hàng không tồn tại hoặc rỗng
        if (is_null($cart) || empty($cart)) {
            return view('cart', [
                'products' => [], // Truyền mảng rỗng để tránh lỗi trong view
            ]);
        }

        // Lấy danh sách ID sản phẩm từ giỏ hàng
        $product_id = array_keys($cart);
        $products = products::whereIn('id', $product_id)->get();

        return view('cart', [
            'products' => $products
        ]);
    }

    public function delete_cart(Request $request)
    {
        $cart = Session::get('cart');
        $product_id = $request->id;
        unset($cart[$product_id]);
        Session::put('cart', $cart);
        return redirect('/cart');
    }
    public function update_cart(Request $request)
    {
        $cart = $request->input('product_id'); // [product_id => quantity]
        $dates = $request->input('date'); // [product_id => date]

        // Cập nhật session giỏ hàng
        Session::put('cart', $cart);

        // Cập nhật ngày nếu người dùng chọn
        Session::put('dates', $dates);

        return redirect('/cart')->withInput(); // giữ lại dữ liệu nếu có lỗi
    }


   
    public function store(Request $request)
    {

        
        $user = Auth::user();
        $token = Str::random(12);
        $order = new orders();
        $order->user_id = $user->id;
        $order->username = $user->name;
        $order->email = $user->email;
        $order->day_checkin = $request->input('day_checkin');
        $order->day_checkout = $request->input('day_checkout');
        $order->note = $request->input('note');
        $order->total = $request->input('total');
        $order->order_detail = json_encode($request->input('product_id'));
        $order->token =  $token;
        $order->save();
        // dd($order);
        // Gọi VNPay
        return $this->createVNPayPayment($order);
    }
    public function createVNPayPayment($order)
    {
        $vnp_TmnCode = "5QKX8ZR5";
        $vnp_HashSecret = "JOAHV7KV7WTK72H0WVN4BC5FZU1N2V6M";
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('vnpay.return');

        $vnp_TxnRef = $order->id; // Mã giao dịch chính là ID đơn hàng
        $vnp_OrderInfo = "Thanh toán đơn hàng #" . $order->id;
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $order->total * 100; // VNPay yêu cầu nhân 100
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => now()->format('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        ksort($inputData);
        $query = '';
        $i = 0;
        $hashdata = '';
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_SecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
        $vnp_Url = $vnp_Url . "?" . $query . 'vnp_SecureHash=' . $vnp_SecureHash;

        return redirect($vnp_Url);
    }
    public function vnpayReturn(Request $request)
    {
        $vnp_ResponseCode = $request->input('vnp_ResponseCode');
        $vnp_TxnRef = $request->input('vnp_TxnRef');

        if ($vnp_ResponseCode == '00') { // Thanh toán thành công
            $order = orders::find($vnp_TxnRef);
            if ($order) {
                $order->status = 'paid';
                $order->save();
            }

            return redirect('/order_success')->with('success', 'Thanh toán thành công!');
        } else {
            return redirect('/order_success')->with('error', 'Thanh toán thất bại!');
        }
    }
}
