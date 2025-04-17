<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Giỏ Hàng') }}
        </h2>
    </x-slot>

    <section class="cart-secsion p-to-top">
        <form action="/cart/send" method="POST">
            <div class="container">
                <div class="row-grid">
                    {{-- <div class="row-flex row-flex-product-detail">
                        <p class="heading-text">Giỏ Hàng</p>
                    </div>   --}}
                </div>
                <div class="row-grid">
                    <div class="cart-secsion-left">
                        <h2 class="main-h2">Căn Hộ Đã Chọn</h2>
                        @if (isset($products) && count($products) > 0)
                            <div class="cart-secsion-left-detail">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Ảnh</th>
                                            <th>Căn Hộ</th>
                                            <th>Ngày Thuê</th>
                                            <th>Thành Tiền</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody class="deleta-table">
                                        @php $total = 0; @endphp
                                        @foreach ($products as $product)
                                            @php
                                                $price = $product->price_sale * Session::get('cart')[$product->id];
                                                $total += $price;
                                            @endphp
                                            <tr>
                                                <td><img style="width: 70px;" src="{{ asset($product->avatar) }}"
                                                        alt=""></td>
                                                <td>
                                                    <div class="product-detail-right-infor">
                                                        <h1>{{ $product->Name }}</h1>
                                                        <div class="hot-product-item-price">
                                                            <p>
                                                                <span
                                                                    class="sale">{{ number_format($product->Price_sale) }}<sup>₫</sup></span>
                                                                <span
                                                                    class="money">{{ number_format($product->Price_nomal) }}<sup>₫</sup></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="product-detail-right-quantity">
                                                        <p>Số Ngày Thuê</p>
                                                        <div class="product-detail-right-quantity-input">
                                                            <i class="ri-subtract-line"></i>
                                                            <input onkeydown="return false"
                                                                name="product_id[{{ $product->id }}]"
                                                                class="quantity-input" type="number"
                                                                value="{{ Session::get('cart')[$product->id] }}">
                                                            <i class="ri-add-line"></i>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span type="date"></span>
                                                </td>
                                                <td>
                                                    <p>{{ number_format($price) }} <sup>₫</sup></p>
                                                </td>
                                                <td><a href="/cart/delete/{{ $product->id }}"><i
                                                            class="ri-close-circle-line"></i></a></td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <th colspan="2">Tổng Tiền</th>
                                            <th colspan="2">{{ number_format($total) }}<sup>₫</sup></th>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- Nút cập nhật giỏ hàng -->
                                <div class="reset-home-and-buy">
                                    <button formaction="/cart/update" style="margin-top: 30px;" class="mainbutton">Cập
                                        Nhật Giỏ Hàng</button>
                                    <a href="/AllProducts"
                                        style="color: blue; font-style: italic;padding-left: 10px;">>>>Tìm Thêm Căn
                                        Hộ</a>
                                </div>
                            </div>
                        @else
                            <p>Giỏ hàng của bạn hiện đang trống. <a href="/shop" style="color: blue;"> Xem Sản Phẩm</a>.</p>
                        @endif

                    </div>
                    <div class="cart-secsion-right">
                        <h2 class="main-h2">Thông Tin Khách Hàng</h2>
                        <form action="/order/confirm" method="POST">
                            <div class="cart-secsion-right-input-name-phone">
                                <input type="text" placeholder="Tên" name="name">
                                <input type="text" placeholder="Điện Thoại" name="phone">
                            </div>
                            <div class="cart-secsion-right-input-email">
                                <input type="email" placeholder="Email" name="email" id="">
                            </div>
                            <div class="cart-secsion-right-input-note">
                                <input type="text" placeholder="Ghi chú" name="note" id="">
                            </div>
                            <div class="cart-secsion-right-input-adress">
                                <P>Thời Gian Nhận Phòng</P>
                                <input type="date" placeholder="Thời Gian" name="address" id="">
                            </div>
                            <button class="mainbutton">Gửi Đơn Hàng</button>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            @csrf
        </form>
    </section>

</x-app-layout>
