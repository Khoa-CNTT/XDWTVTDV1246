<?php

namespace App\Http\Controllers;

use App\Models\orders;
use App\Models\products;
use App\Models\review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderHistoryController extends Controller
{
    // public function index()
    // {
    //     return view('OrderHistory');
    // }
    public function index()
    {
        $user = Auth::user();

        $orders = orders::where('user_id', $user->id)
            ->where('status', 'paid')
            ->get();

        return view('part.order', compact('orders'));
    }
    public function orderdetail()
    {
        return view('part.detail');
    }
    public function detail_order(Request $request)
    {
        // Giả sử order_detail là JSON mảng id sản phẩm, ví dụ: [1, 2, 3]
        $product_ids = json_decode($request->order_detail, true) ?? [];

        $products = [];
        if (!empty($product_ids)) {
            $products = products::whereIn('id', $product_ids)->get();
        }

        return view('part.detail', [
            'products' => $products,

        ]);
    }





    public function review(Request $request)
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        $user = Auth::user();
        if (!$user) {
            // Nếu người dùng chưa đăng nhập, redirect về trang login hoặc thông báo lỗi
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để thực hiện đánh giá.');
        }

        // Lấy product_id từ request và tìm sản phẩm
        $product_id = $request->input('product_id'); // Lấy từ form input

        // Kiểm tra xem sản phẩm có tồn tại không
        $product = products::find($product_id);
        if (!$product) {
            // Nếu không tìm thấy sản phẩm, thông báo lỗi và redirect về trang trước đó
            return redirect()->back()->with('error', 'Căn hộ không tồn tại.');
        }

        // Tạo mới một review
        $review = new Review();
        $review->user_id = $user->id;
        $review->username = $user->name;
        $review->products_id = $product->id; // Lưu product_id từ sản phẩm đã tìm thấy
        $review->review = $request->input('review'); // Lấy nội dung review từ request

        // Lưu thông tin vào database
        $review->save();

        // Redirect về với thông báo thành công
        return redirect()->route('OrderHistory')->with('success', 'Bạn đã đánh giá thành công!');
    }
}
