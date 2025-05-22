@extends('history')
@section('content')
    <section class="product-detail p-to-top">
        <div class="admin-content-main-content-order-list">
            <table>
                @php
                    $hasOrder = false;
                @endphp
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Ngày Đến</th>
                        <th>Ngày Trả</th>
                        <th style="max-width: 100px; white-space: normal; word-break: break-word;">Ghi Chú</th>
                        <th>Giá</th>
                        <th>Căn Hộ</th>
                        <th>Trạng Thái</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($orders as $order)
                        @if ($order->user_id == Auth::id())
                            @php $hasOrder = true; @endphp
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->username }}</td>
                                <td>{{ $order->day_checkin }}</td>
                                <td>{{ $order->day_checkout }}</td>
                                <td style="max-width: 100px; white-space: normal; word-break: break-word;">
                                    {{ $order->note }}
                                </td>
                                <td>{{ number_format($order->total) }} VNĐ</td>
                                <td><a class="edit-class" href="/order/detail/{{$order -> order_detail}}">Xem</a></td>
                                <td>
                                    @if ($order->status == 'pending')
                                        <a class="none-confirm-order" href="">Thanh Toán Thất Bại</a>
                                    @elseif ($order->status == 'paid')
                                        <a class="confirm-order" href="">Đã Thanh Toán</a>
                                    @endif
                                </td>
                               
                            </tr>
                        @endif
                    @endforeach

                    @unless ($hasOrder)
                        <tr>
                            <td colspan="8" style="text-align: center; font-weight: bold; color: gray;">
                                Chưa có đơn hàng nào
                            </td>
                        </tr>
                    @endunless
                </tbody>

            </table>
        </div>
    </section>
@endsection
