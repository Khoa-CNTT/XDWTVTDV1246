<?php

namespace App\Http\Controllers;

use App\Models\article;
use App\Models\banners;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index(){
        $banner = banners::all();
        $article = article::all();
        return view('dashboard',[
            'banner'=> $banner,
            'article'=> $article
            
        ]);
    }
}
