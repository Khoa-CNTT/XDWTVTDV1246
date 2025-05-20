<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list_account(){
        $users = User::all();
        return view('admin.account.list', [
            'title' => 'Danh Sách Tài Khoản',
            'user' => $users
        ]);
    }
    public function delete_account(Request $request){
        User::find($request->user_id)->delete();
        return response() -> json([
            'success' => true
        ]);
    }
    
    public function edit_account(Request $request){
        $users = User::find($request -> id);
        return view('admin.account.edit',[
            'title' => 'Cấp Quyền Tài Khoản',
            'user' => $users
        ]);
    }
    public function update_account(Request $request){
        $users = User::find($request -> id);
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->usertype = $request->input('usertype');
        $users->password = $request->input('password');
    
        $users->save();
        return redirect('/admin/account/list');
    }

  
}
