<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Illuminate\Http\Request;

class OderController extends Controller
{
   public function show_orderconfirm(Request $request)
   {
    $data = $request->all();
    $user = Auth::user();

    if ($data['vnp_ResponseCode'] == '00' && $data['vnp_TransactionStatus'] == '00') {
        $dates = $request->input('date');
        Order::create([
            'user_name' => $user->name,
            'user_account' => $user->email, // hoặc $user->username nếu bạn có            
            'amount' => $data['vnp_Amount'] / 100,
            'bank_code' => $data['vnp_BankCode'],
            'bank_tran_no' => $data['vnp_BankTranNo'],
            'card_type' => $data['vnp_CardType'],
            'order_info' => $data['vnp_OrderInfo'],
            'pay_date' => $data['vnp_PayDate'],
            'transaction_no' => $data['vnp_TransactionNo'],
            'txn_ref' => $data['vnp_TxnRef'],
            'secure_hash' => $data['vnp_SecureHash'],
            'status' => 0, // 0: Chưa xác nhận
        ]);
    }
        $name = Auth::user()->name;
        $vnp_TxnRef = time();
       return view('order',[
        'name' => $name,
        'vnp_TxnRef' => $vnp_TxnRef,
       ]);
   }
  

// public function confirm(Request $request)
// {
//     $data = $request->all();
//     $user = Auth::user();

//     if ($data['vnp_ResponseCode'] == '00' && $data['vnp_TransactionStatus'] == '00') {
//         Order::create([
//             'user_name' => $user->name,
//             'user_account' => $user->email, // hoặc $user->username nếu bạn có
//             'amount' => $data['vnp_Amount'] / 100,
//             'bank_code' => $data['vnp_BankCode'],
//             'bank_tran_no' => $data['vnp_BankTranNo'],
//             'card_type' => $data['vnp_CardType'],
//             'order_info' => $data['vnp_OrderInfo'],
//             'pay_date' => $data['vnp_PayDate'],
//             'transaction_no' => $data['vnp_TransactionNo'],
//             'txn_ref' => $data['vnp_TxnRef'],
//             'secure_hash' => $data['vnp_SecureHash'],
//             'status' => 0, // 0: Chưa xác nhận
//         ]);
//     }

//     return view('payment.result', ['status' => true]);
// }
}