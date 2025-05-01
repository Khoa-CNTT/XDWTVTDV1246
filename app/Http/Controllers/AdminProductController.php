<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function insert_product(Request $request)
    {
        
        $products = new products();
        $products->Name = $request->input('Name');
        $products->Address = $request->input('Address');
        $products->Star_rating = $request->input('Star_rating');
        $products->Price_nomal = $request->input('Price_nomal');
        $products->Price_sale = $request->input('Price_sale');
        $products->Phone = $request->input('Phone');
        $products->Gmail = $request->input('Gmail');
        $products->Description = $request->input('Description');
        $products->Content = $request->input('Content');
        $products->Region = $request->input('Region');
        $products->avatar = $request->input('avatar');
        if($request->has('product_images')){
            $product_images = implode('*', $request->input('product_images'));
            $products->images = $product_images;
        }
        
        // dd($request -> all());
        $products->save();
        return redirect('/admin/product/list');
    }
    public function list_product(){
        $products =products::all();
        // dd($product);
        return view('admin.product.list',[
        'title' => 'Danh Sách Căn Hộ',
        'products'=> $products
        ]);

    }
    public function add_product(){
        return view('admin.product.add',[
        'title' => 'Thêm Căn Hộ',
        ]);
    }
    public function delete_product(Request $request){
        products::find($request -> product_id)->delete();
        return response() -> json([
            'success' => true
        ]);
    }
    public function edit_product(Request $request){
        $product = products::find($request -> id);
        return view('admin.product.edit',[
            'title' => 'Sửa Căn Hộ',
            'product' => $product
        ]);
    }
    public function update_product(Request $request){
        $products = products::find($request -> id);
        $products->Name = $request->input('Name');        
        $products->Address = $request->input('Address');
        $products->Star_rating = $request->input('Star_rating');
        $products->Price_nomal = $request->input('Price_nomal');
        $products->Price_sale = $request->input('Price_sale');
        $products->Phone = $request->input('Phone');
        $products->Gmail = $request->input('Gmail');
        $products->Description = $request->input('Description');
        $products->Content = $request->input('Content');
        $products->Region = $request->input('Region');
        $products->avatar = $request->input('avatar');
        if($request->has('product_images')){
            $product_images = implode('*', $request->input('product_images'));
            $products->images = $product_images;
        }
       
        $products->save();
        return redirect('/admin/product/list');
    }
}
