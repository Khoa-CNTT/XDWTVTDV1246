<form action="/cart/add" method="post">
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
                    <h1 style="padding-bottom: 20px;padding-top: 25px; color: blue; margin-top: -30px;font-weight: bold">
                        {{ $product->Name }}</h1>
                    <span><span style="font-weight: bold;">Địa chỉ: </span> {{ $product->Address }} </span><span> <br>
                    </span>
                    <span><span style="font-weight: bold;">Chất lượng :</span>
                    <span style="color: rgb(189, 189, 3)">
                        @for ($i = 0; $i < $product->Star_rating; $i++)
                            ★
                        @endfor
                    </span>
                    </span>
                    <div class="hot-product-item-price">
                        <p><span style="font-weight: bold;">Giá Tiền : </span><span class="sale"> {{ number_format($product->Price_sale) }}<sup
                                    style="padding-right: 20px">₫</sup></span><span
                                class="money">{{ number_format($product->Price_nomal) }}<sup>₫</sup></span> </p>
                    </div>

                </div>
                <br>
                <h1 style="font-size: 25px;font-weight: bold">Thông tin căn hộ</h1>

                <div class="product-detail-right-price">

                    <ul>
                        {!! nl2br(e($product->Description)) !!}
                    </ul>
                </div>
                <div style="padding-top: 100px" class="product-detail-right-button">
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="mainbutton" style="padding-left: 30px;padding-right: 30px">Đặt Ngay</button>
                </div>
            </div>
        </div>
        <div class="row-flex" style="padding-bottom: 100px;">
    <div class="product-detail-content">
        <h2>Mô tả chi tiết</h2>
        <div style="max-width: 600px; white-space: normal; word-break: break-word;">
            <p class="note-text" onclick="toggleNote(this)" style="margin-bottom: 0; cursor: pointer;">
                {!! nl2br(e($product->Content)) !!}
            </p>
            <small class="read-more" onclick="toggleNote(this)" style="color:blue; cursor:pointer;">xem thêm</small>
        </div>
    </div>
</div>

<style>
.note-text {
    display: -webkit-box;
    -webkit-line-clamp: 5; /* giới hạn 5 dòng */
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: normal;
}
</style>

<script>
function toggleNote(el) {
    const container = el.closest('div').querySelector('.note-text');
    const more = el.closest('div').querySelector('.read-more');

    if (container.style.webkitLineClamp === 'unset' || container.style.webkitLineClamp === '') {
        container.style.webkitLineClamp = '5';
        more.textContent = '... xem thêm';
    } else {
        container.style.webkitLineClamp = 'unset';
        more.textContent = 'Thu gọn';
    }
}
</script>

    </div>
    @csrf
</form>
