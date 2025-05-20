<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class OderController extends Controller
{

    public function index()
    {
        return view('part.success');
    }
    public function failed()
    {
        return view('part.failed');
    }
}
