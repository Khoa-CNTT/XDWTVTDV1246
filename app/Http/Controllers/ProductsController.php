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
    
    public function show_product(Request $request){
        $product = products::find($request -> id);
        return view('Products', [
            'product' =>  $product,
            
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
