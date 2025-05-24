<x-app-layout>
    <x-slot name="header">
        <div class="header-wrapper">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Căn hộ') }}
            </h2>
            <div class="header-search">
                <form action="{{ route('Search') }}" method="GET" style="position: relative;">
                    <input type="text" name="keyword" placeholder="Tìm Kiếm" value="{{ request('keyword') }}"
                        style="height: 30px; border: 1px solid black; padding-left: 24px; border-radius: 15px;">
                    <button type="submit"
                        style="position: absolute; left: 6px; top: 50%; transform: translateY(-50%); border:none; background:none; cursor:pointer; padding:0;">
                        <i class='bx bx-search'></i>
                    </button>
                </form>
            </div>
        </div>
    </x-slot>
    <style>
        .header-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-search {
            position: relative;
        }

        .header-search i {
            position: absolute;
            left: 6px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .header-search input {
            height: 30px;
            border: 1px solid black;
            padding-left: 24px;
            border-radius: 15px;
            text-align: center;
        }
    </style>
    <div class="container mt-4">
        @if (isset($keyword) && $keyword != '')
            <p>Kết quả tìm kiếm cho: "<strong style="color: blue">{{ $keyword }}</strong>"</p>
        @endif
    </div>

  

    @php
        $regions = $products->pluck('Region')->unique();
    @endphp

    @foreach ($regions as $region)
        <section class="hot-products">
            <div class="container">
                <h3 class="region-title" style="font-weight: bold; padding-bottom: 30px">{{ $region }}</h3>
                <div class="row-grid row-grid-hot-products">
                    @foreach ($products->where('Region', $region) as $product)
                        <div class="hot-product-item">
                            <div class="hangrao">
                                <a href="/Products/{{ $product->id }}">
                                    <img style="height: 200px" src="{{ asset($product->avatar) }}" alt="">
                                </a>
                                <p class="red">
                                    <a href="/Products/{{ $product->id }}">
                                        {{ $product->Name }}
                                    </a>
                                </p>
                                <span class="color-span"><span style="color: black">Địa chỉ: </span>
                                    {{ $product->Address }}
                                </span>
                                <br>
                                <span class="color-span"><span style="color: black">Chất lượng: </span>
                                    <span style="color: rgb(189, 189, 3)">
                                        @for ($i = 0; $i < (int) $product->Star_rating; $i++)
                                            ★
                                        @endfor
                                    </span>
                                </span>
                                <div class="hot-product-item-price">
                                    <p>
                                        <span class="sale">
                                            {{ number_format($product->Price_sale) }}<sup>₫</sup>
                                        </span>
                                        <span class="money">
                                            {{ number_format($product->Price_nomal) }}<sup>₫</sup>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                    @endforeach
                   
                </div>
            </div>
              <div class="pading-products" style="padding-bottom: 50px"></div>
        </section>
         
    @endforeach
<div class="haha" style="margin-bottom: 200px"></div>
    <footer>
        @include('part.footer')
    </footer>
</x-app-layout>