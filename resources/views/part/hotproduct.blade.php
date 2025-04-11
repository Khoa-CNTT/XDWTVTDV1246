
<div class="container">
    <div class="row-grid">
        {{-- <p class="heading-text">MacBook</p> --}}
    </div>
    <div class="row-grid row-grid-hot-products">
        @foreach ($products as $product )
            <div class="hot-product-item">
                <div class="hangrao">
                    <a href="/shop/product/{{$product -> id}}"><img  src="{{asset($product -> avatar)}}" alt=""></a>
                    <p class="red">
                        <a href="/shop/product/{{$product -> id}}">
                            {{$product -> name}}
                        </a>
                    </p>
                <span class="color-span">
                    {{$product -> ram}}
                </span>
                <span class="color-span">
                    {{$product -> ssd}}
                </span>
                <div class="hot-product-item-price">
                    <p>
                        <span class="sale">
                            {{number_format($product -> price_sale)}}<sup>₫</sup>
                        </span>
                        <span class="money" >
                            {{number_format($product -> price_noma)}}<sup>₫</sup>
                        </span>
                        
                    </p>
                </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

