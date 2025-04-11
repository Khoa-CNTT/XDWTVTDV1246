@extends('frontend.main')
@section('contents')
<section class="hot-products">
    <div class="container">
        <div class="row-grid">
            <p class="heading-text">ASUS</p>
        </div>
        <div class="row-grid row-grid-hot-products">
            <div class="hot-product-item">
                <a href="" class="imgred"><img  src="{{asset('frontend/asset/images/asv1.jpg')}}" alt=""></a>
                <p class="red"><a href="">Laptop Asus Vivobook 15</a></p>
                <span class="color-span">Ram 16GB</span><span class="color-span">SSD 512GB</span>
                <div class="hot-product-item-price">
                    <p><span  class="money">12.000.000<sup>₫</sup></span> <span class="sale">14.000.000₫</span></p>
                </div>
                <div class="buy">
                    <button onclick="addRow(this)" class="mainbutton" id="asv"><i class="ri-shopping-cart-2-line"></i></button>

                </div>
            </div>
            <div class="hot-product-item">
                <a href="" class="imgred"><img  src="{{asset('frontend/asset/images/at.jpg')}}" alt=""></a>
                <p class="red"><a href="">Laptop Asus TUF Gaming A15</a></p>
                <span class="color-span">Ram 16GB</span><span class="color-span">SSD 512GB</span>
                <div class="hot-product-item-price">
                    <p><span  class="money">17.000.000<sup>₫</sup></span> <span class="sale">20.000.000₫</span></p>
                </div>
                <div class="buy">
                    <button onclick="addRow(this)" class="mainbutton" id="at"><i class="ri-shopping-cart-2-line"></i></button>

                </div>
            </div>
            <div class="hot-product-item">
                <a href="" class="imgred"><img  src="{{asset('frontend/asset/images/az.jpg')}}" alt=""></a>
                <p class="red"><a href="">Laptop Asus Zenbook 14</a></p>
                <span class="color-span">Ram 16GB</span><span class="color-span">SSD 512GB</span>
                <div class="hot-product-item-price">
                    <p><span  class="money">28.000.000<sup>₫</sup></span> <span class="sale">26.000.000₫</span></p>
                </div>
                <div class="buy">
                    <button onclick="addRow(this)" class="mainbutton" id="az"><i class="ri-shopping-cart-2-line"></i></button>

                </div>
            </div>
            <div class="hot-product-item">
                <a href="" class="imgred"><img  src="{{asset('frontend/asset/images/arog.jpg')}}" alt=""></a>
                <p class="red"><a href="">Asus Gaming ROG Strix SCAR 18</a></p>
                <span class="color-span">Ram 64GB</span><span class="color-span">SSD 2TB</span>
                <div class="hot-product-item-price">
                    <p><span  class="money">117.000.000<sup>₫</sup></span> <span class="sale">120.000.000₫</span></p>
                </div>
                <div class="buy">
                    <button onclick="addRow(this)" class="mainbutton" id="arog"><i class="ri-shopping-cart-2-line"></i></button>

                </div>
            </div>
            
        </div>
        
    </div>
</section>
@endsection