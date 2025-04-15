<form action="cart/add" method="post">
    <div class="container">
        <div class="row-flex row-flex-product-detail">
            <p>Căn Hộ</p><i class="ri-arrow-right-line"></i>
            <p>{{ $product->Name }}</p>
        </div>
        <div class="row-grid">
            <div class="product-detail-left">
                <img class="main-image" src="{{ asset($product->avatar) }}" alt="">
                <div class="product-image-item">

                    @php
                        $product_images = explode('*', $product->images);
                    @endphp
                    @foreach ($product_images as $product_image)
                        <img src="{{ asset($product_image) }}" alt="">
                    @endforeach
                </div>
            </div>
            <div class="product-detail-right">
                <div class="product-detail-right-infor">
                    <h1 style="padding-bottom: 20px;padding-top: 25px; color: blue; margin-top: -30px">
                        {{ $product->Name }}</h1>
                    <span><span style="font-weight: bold;">Địa chỉ: </span> {{ $product->Address }} </span><span> <br>
                    </span> <span><span style="font-weight: bold;">Số sao: </span> {{ $product->Star_rating }}</span>
                    <div class="hot-product-item-price">
                        <p><span class="sale">{{ number_format($product->Price_sale) }}<sup
                                    style="padding-right: 20px">₫</sup></span><span
                                class="money">{{ number_format($product->Price_nomal) }}<sup>₫</sup></span> </p>
                    </div>

                </div>
                <br>
                <h2>Thông tin căn hộ</h2>

                <div class="product-detail-right-price">

                    <ul>
                        {!! nl2br(e($product->Description)) !!}
                    </ul>
                </div>
                <div class="product-detail-right-quantity">
                    <h2>Số Ngày Thuê Căn Hộ</h2>
                    <div class="product-detail-right-quantity-input">
                        <i class="ri-subtract-line"></i>
                        <input onkeyDown="return false" class="quantity-input" name="product_qty" type="number"
                            value="1">
                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                        <i class="ri-add-line"></i>
                    </div>
                </div>
                <div class="product-detail-right-button">
                    <button type="submit" class="mainbutton">Đặt Ngay</button>
                </div>
            </div>
        </div>
        <div class="row-flex">
            <div class="product-detail-content">
                <h2>Mô tả chi tiết</h2>
                <p>
                    {{ $product->Content }}
                </p>
                <img src="" alt="">
            </div>
        </div>
    </div>
    @csrf
</form>
