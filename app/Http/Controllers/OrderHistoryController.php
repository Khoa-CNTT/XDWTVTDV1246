<?php

namespace App\Http\Controllers;

use App\Models\orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderHistoryController extends Controller
{
    // public function index()
    // {
    //     return view('OrderHistory');
    // }
    public function index() {
        $user = Auth::user();
        $orders = orders::where('user_id', $user->id)->get(); // hoặc where('username', $user->username)
    
        return view('OrderHistory', 
        compact('orders'));
    }
  
}
