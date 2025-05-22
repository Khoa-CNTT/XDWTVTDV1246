<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
   
    // public function index(){
    //     $products = products::all();
    //     return view('Products',[
    //         'products' => $products
    //     ]);
    // }
    public function show_allhotproduct() {
        $products = products::all();  // Lấy tất cả các sản phẩm từ bảng Product
        return view('AllProducts', [
            'products' => $products   // Truyền biến $products vào view
        ]);
    }
    
  public function show_product(Request $request)
{
    // Lấy sản phẩm theo ID, nếu không tìm thấy sẽ trả về lỗi 404
    $product = products::findOrFail($request->id);
    
    // Lấy tất cả các review của sản phẩm
    $reviews = $product->reviews;

    // Trả về view và truyền dữ liệu sản phẩm và review
    return view('Products', [
        'product' => $product,
        'reviews' => $reviews, // Truyền reviews vào view
    ]);
}

    public function search(Request $request)
    {
         $keyword = $request->input('keyword');

    $products = products::query();

    if ($keyword) {
        $products = $products->where('Name', 'LIKE', "%{$keyword}%");
    }

    $products = $products->get();

    return view('AllProducts', compact('products', 'keyword'));
    }
}
