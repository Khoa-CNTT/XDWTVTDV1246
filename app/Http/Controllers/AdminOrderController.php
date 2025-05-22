<?php

namespace App\Http\Controllers;

use App\Models\orders;
use App\Models\products;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function list_order()
    {
        $orders = orders::all();
        return view('admin.order.list', [
            'orders' => $orders,
            'title' => 'Danh Sách Thanh Toán'
        ]);
    }
    public function listsc_order()
    {
        $orders = orders::where('status', 'paid')->get();
        return view('admin.order.list', [
            'orders' => $orders,
            'title' => 'Danh Sách Đơn Hàng'
        ]);
    }

    public function delete_order(Request $request)
    {
        $order = orders::find($request->order_id);

        if (!$order) {
            return response()->json(['success' => false], 404);
        }

        $order->delete();

        return response()->json(['success' => true]);
    }

    public function detail_order($id)
    {
        $order = orders::findOrFail($id);

        $product_ids = json_decode($order->order_detail, true);
        $products = products::whereIn('id', $product_ids)->get();

        return view('admin.order.detail', [
            'products' => $products,
            'order_detail' => $product_ids,
            'title' => 'Chi Tiết Đơn Hàng'
        ]);
    }
}
