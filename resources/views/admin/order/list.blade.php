@extends('admin.dashboard')
@section('content')
    <div class="admin-content-main-content-order-list">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Ngày Đến</th>
                    <th>Ngày Trả</th>
                    <th style="max-width: 100px; white-space: normal; word-break: break-word;">Ghi Chú</th>
                    <th>Giá</th>
                    <th>Trạng Thái</th>
                    <th>Chi Tiết</th>
                    <th>Tùy Biến</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->username }}</td>
                        <td>{{ $order->day_checkin }}</td>
                        <td>{{ $order->day_checkout }}</td>
                        <td style="max-width: 100px; white-space: normal; word-break: break-word;">
                            {{ $order->note }}
                        </td>
                        <td>{{ number_format($order->total) }} VNĐ</td>
                        <td>
                            @if ($order->status == 'pending')
                                <a class="none-confirm-order" href="">Chưa Thanh Toán</a>
                            @elseif ($order->status == 'paid')
                                <a class="confirm-order" href="">Đã Thanh Toán</a>
                            @endif

                        </td>
                        <td><a class="edit-class" href="/admin/order/detail/{{ $order->id }}">Xem</a></td>

                        <td><a onclick="removeRowOD(order_id=<?php echo $order->id; ?>,url='/admin/order/delete')"
                                class="delete-class" href="">Xóa</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
