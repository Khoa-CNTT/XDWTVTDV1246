<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;
class CartController extends Controller
{
     public function add_cart(Request $request){
        $product_id = $request -> product_id;
        $product_qty = $request -> product_qty;
        if(is_null(Session::get('cart'))){
            Session::put('cart',[
                $product_id => $product_qty 
            ]);
            return redirect('/cart');
        }
        else {
            $cart = Session::get('cart');
            if(Arr::exists($cart,$product_id)){
                $cart[$product_id]= $cart[$product_id] + $product_qty;
                Session::put('cart',$cart);
                return redirect('/cart');
            }
            else {
                $cart[$product_id]= $product_qty;
                Session::put('cart',$cart);
                return redirect('/cart');
            }
        }
    }
    public function show_cart()
    {
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
    
    public function delete_cart(Request $request){
        $cart = Session::get('cart');
        $product_id = $request -> id;
        unset($cart[$product_id]);
        Session::put('cart',$cart);
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
    
    // public function send_cart(Request $request){
        
    //     $token = Str::random(12);
    //     $order = new order;
    //     $order -> name = $request -> input('name');
    //     $order -> phone = $request -> input('phone');
    //     $order -> email = $request -> input('email');
    //     $order -> city = $request -> input('city');
    //     $order -> district = $request -> input('district');
    //     $order -> ward = $request -> input('ward');
    //     $order -> address = $request -> input('address');
    //     $order -> note = $request -> input('note');
    //     $order_detail  = json_encode($request -> input('product_id'));
    //     $order -> order_deail = $order_detail;
    //     $order -> token =  $token;
    //     $order -> save();
    //     Session::flush('cart');
    //     $mailinfo =  $order -> email ;
    //     $nameinfo = $order -> name;
        
        
    //     $Mail = Mail::to($mailinfo) -> send(new TestMail($nameinfo));
    //     // Notification::send($order, new EmailNotification($nameinfo));
    //     Notification::route('mail', 'vietchymte@gmail.com')
    //             ->notify(new EmailNotification($nameinfo));

    //     return redirect('/shop/order_confirm');
    // }
}
