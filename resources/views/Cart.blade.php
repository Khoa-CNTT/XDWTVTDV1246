<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Giỏ Hàng') }}
        </h2>
    </x-slot>

    <section class="cart-secsion p-to-top">

        <form action="/cart/send" method="POST">
            <div class="container">
                <div class="row-grid" style="text-align: center;">
                    <div class="cart-secsion-left">
                        <h2 class="main-h2">Căn Hộ Đã Chọn</h2>
                        @if (isset($products) && count($products) > 0)
                            <div class="cart-secsion-left-detail">
                                {{-- <form action="/order/confirm" method="POST"> --}}
                                <table style="text-align: center;">
                                    <thead>
                                        <tr>
                                            <th>Ảnh</th>
                                            <th>Căn Hộ</th>
                                            <th>Thành Tiền</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody class="deleta-table">
                                        @php $total = 0; @endphp
                                        @foreach ($products as $product)
                                            @php
                                                $total += $product->Price_sale;
                                            @endphp
                                            <tr>
                                                <td><img style="width: 100px;" src="{{ asset($product->avatar) }}"
                                                        alt="">
                                                        <input type="hidden" name="product_id[]" value="{{ $product->id }}">
                                                    </td>
                                                <td>
                                                    <div class="product-detail-right-infor">
                                                        <h1>{{ $product->Name }}</h1>
                                                        <br>
                                                        <div class="hot-product-item-price">
                                                            <p>
                                                                <span
                                                                    class="sale">{{ number_format($product->Price_sale) }}<sup>₫</sup></span>
                                                                <span
                                                                    class="money">{{ number_format($product->Price_nomal) }}<sup>₫</sup></span>
                                                            </p>
                                                        </div>
                                                    </div>



                                                </td>

                                                <td>
                                                    <p>{{ number_format($product->Price_sale) }} <sup>₫</sup></p>
                                                    <input type="hidden" class="price-per-day" value="{{ $product->Price_sale }}">

                                                </td>


                                                <td><a href="/cart/delete/{{ $product->id }}"><i
                                                            class="ri-close-circle-line"></i></a></td>
                                            </tr>
                                        @endforeach
                                        <tr style="background-color: burlywood">

                                            <th colspan="2">Tổng Tiền</th>
                                            <th colspan="1"><span id="total-display">{{ number_format($total) }}</span><sup>₫</sup>
                                                <input type="hidden" name="total" id="total" value="{{ $total }}">
                                            </th>
                                            <th colspan="1" style="text-align: center">

                                                {{-- <button style="margin: 0 auto;" formaction="/cart/update"
                                                class="mainbutton">Cập
                                                Nhật Giỏ Hàng
                                            </button> --}}

                                            </th>

                                        </tr>
                                    </tbody>
                                </table>
                                {{-- @csrf
                        </form> --}}
                                <div>

                                    <p class="note" style="color: red;text-align: left;">
                                        <span style="font-weight: bold;">Lưu ý:</span>
                                        <span style="font-style: italic; font-size: 12px; ">
                                            Giờ trả phòng của chúng tôi là 10:00 sáng. Quý khách vui lòng lưu ý thời
                                            gian để tránh phát sinh chi phí ngoài ý muốn. Xin chân thành cảm ơn!
                                        </span>
                                    </p>
                                </div>
                                <!-- Nút cập nhật giỏ hàng -->

                            </div>
                        @else
                            <p>Giỏ hàng của bạn hiện đang trống. <a href="/AllProducts" style="color: blue;"> Xem Sản
                                    Phẩm</a>.</p>
                        @endif

                    </div>
                    <div class="cart-secsion-right">
                        <h2 class="main-h2">Thông Tin Ngày Thuê</h2>
                        <form action="/order/confirm" method="POST">
                            <div class="cart-section-right-input-dates">
                                <div class="cart-section-right-input-day-checkin">
                                    <p>Ngày Nhận Căn Hộ</p>
                                    <input type="date" name="day_checkin" id="day_checkin" min="{{ date('Y-m-d') }}" required>
                                </div>
                                <div class="cart-section-right-input-day-checkout">
                                    <p>Ngày Trả Căn Hộ</p>
                                    <input type="date" name="day_checkout" id="day_checkout" min="{{ date('Y-m-d') }}" required>
                                </div>
                            </div>
                            <p style="text-align: left;margin-bottom: 5px;font-weight: bold; padding-top: 30px">Ghi chú
                                thêm</p>
                            <div class="cart-secsion-right-input-note">
                                <input type="text" placeholder="Ghi chú" name="note" id="">
                            </div>

                            <div class="cart-secsion-right-button">
                                <button class="mainbutton">Thanh Toán</button>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            @csrf
        </form>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const checkin = document.getElementById("day_checkin");
            const checkout = document.getElementById("day_checkout");
            const totalDisplay = document.getElementById("total-display");
        
            function calculateTotal() {
                const checkInDate = new Date(checkin.value);
                const checkOutDate = new Date(checkout.value);
        
                if (checkin.value && checkout.value && checkOutDate > checkInDate) {
                    const days = Math.floor((checkOutDate - checkInDate) / (1000 * 60 * 60 * 24));
                    let total = 0;
        
                    document.querySelectorAll('.price-per-day').forEach(el => {
                        const price = parseInt(el.value);
                        total += price * days;
                    });
        
                    totalDisplay.textContent = total.toLocaleString('vi-VN');
                }
            }
        
            checkin.addEventListener("change", calculateTotal);
            checkout.addEventListener("change", calculateTotal);
        });
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const checkin = document.getElementById("day_checkin");
                const checkout = document.getElementById("day_checkout");
                const form = document.querySelector('form[action="/order/confirm"]');
            
                form.addEventListener("submit", function (e) {
                    if (!checkin.value || !checkout.value) {
                        alert("Vui lòng nhập đầy đủ ngày nhận và ngày trả.");
                        e.preventDefault();
                        return;
                    }
            
                    const inDate = new Date(checkin.value);
                    const outDate = new Date(checkout.value);
                    const today = new Date();
                    today.setHours(0, 0, 0, 0);
            
                    if (inDate < today) {
                        alert("Ngày nhận không được nhỏ hơn hôm nay.");
                        e.preventDefault();
                        return;
                    }
            
                    const minCheckout = new Date(inDate);
                    minCheckout.setDate(minCheckout.getDate() + 1);
            
                    if (outDate < minCheckout) {
                        alert("Ngày trả phải sau ngày nhận ít nhất 1 ngày.");
                        e.preventDefault();
                        return;
                    }
                });
            });
            </script>
            
            
</x-app-layout>
