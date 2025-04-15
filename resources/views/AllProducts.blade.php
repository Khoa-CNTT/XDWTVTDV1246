<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tất cả căn hộ') }}
        </h2>
    </x-slot>
    <div class="pading-products" style="padding-bottom: 50px"></div>
<section class="hot-products">
    <div class="container">
        <div class="row-grid">
            {{-- <p class="heading-text">MacBook</p> --}}
        </div>
        <div class="row-grid row-grid-hot-products">
            @foreach ($products as $product )
                <div class="hot-product-item">
                    <div class="hangrao">
                        <a href="/Products/{{$product -> id}}"><img  src="{{asset($product -> avatar)}}" alt=""></a>
                        <p class="red">
                            <a href="/Products/{{$product -> id}}">
                                {{$product -> Name}}
                            </a>
                        </p>
                    <span class="color-span">
                        {{$product -> Address}}
                    </span>
                    <span class="color-span">
                        {{$product -> Star_rating}}
                    </span>
                    <div class="hot-product-item-price">
                        <p>
                            <span class="sale">
                                {{number_format($product -> Price_sale)}}<sup>₫</sup>
                            </span>
                            <span class="money" >
                                {{number_format($product -> Price_nomal)}}<sup>₫</sup>
                            </span>
                            
                        </p>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
</section>
</x-app-layout>
