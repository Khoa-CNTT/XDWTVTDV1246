<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lịch Sử Đơn Mua') }}
        </h2>
    </x-slot>

    <section class="product-detail p-to-top">
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
                        <th>Tùy Biến</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        @if ($order->user_id == Auth::id())
                            {{-- hoặc $order->username == Auth::user()->username --}}
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
                                <td><a onclick="removeRowOD(order_id=<?php echo $order->id; ?>,url='/admin/order/delete')"
                                        class="delete-class" href="">Xóa</a></td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</x-app-layout>
<footer>
    @include('part.footer')
</footer>
