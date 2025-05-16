<?php

namespace App\Http\Controllers;

use App\Models\article;
use Illuminate\Http\Request;

class AdminArticleController extends Controller
{
    public function insert_article(Request $request)
    {
        $article = new article();
        $article->Content = $request->input('Content');
        // dd($request -> all());
        $article->save();
        return redirect('/admin/article/list');
    }




    public function list_article(){
        $article = article::all();
        // dd($banner);
        return view('admin.article.list',[
        'title' => 'Danh Sách Banner',
        'article'=> $article
        ]);

    }
    public function add_article(){
        return view('admin.article.add',[
        'title' => 'Thêm Bài Viết',
        ]);
    }
    public function delete_article(Request $request){
        article::find($request -> article_id)->delete();
        return response() -> json([
            'success' => true
        ]);
    }
    public function edit_article(Request $request){
        $article = article::find($request -> id);
        return view('admin.article.edit',[
            'title' => 'Sửa Bài Viết',
            'article' => $article
        ]);
    }
    public function update_article(Request $request){
        $article = article::find($request -> id);
        $article->content = $request->input('content');
        $article->save();
        return redirect('/admin/article/list');
    }
}
