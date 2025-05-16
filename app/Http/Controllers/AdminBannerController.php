<?php

namespace App\Http\Controllers;

use App\Models\banners;
use Illuminate\Http\Request;

class AdminBannerController extends Controller
{
    public function insert_banner(Request $request)
    {
        $banners = new banners();
        if($request->has('product_images')){
            $banner_images = implode('*', $request->input('product_images'));
            $banners->images = $banner_images;
        }
        // dd($request -> all());
        $banners->save();
        return redirect('/admin/slide/list');
    }




    public function list_banner(){
        $banner = banners::all();
        // dd($banner);
        return view('admin.slide.list',[
        'title' => 'Danh Sách Banner',
        'banner'=> $banner
        ]);

    }
    public function add_banner(){
        return view('admin.slide.add',[
        'title' => 'Thêm Banner',
        ]);
    }
    public function delete_banner(Request $request){
        banners::find($request -> banner_id)->delete();
        return response() -> json([
            'success' => true
        ]);
    }
    public function edit_banner(Request $request){
        $banner = banners::find($request -> id);
        return view('admin.slide.edit',[
            'title' => 'Sửa Banner',
            'banner' => $banner
        ]);
    }
    public function update_banner(Request $request){
        $banner = banners::find($request -> id);
        if($request->has('product_images')){
            $banner_images = implode('*', $request->input('product_images'));
            $banner->images = $banner_images;
        }
        $banner->save();
        return redirect('/admin/slide/list');
    }
}
