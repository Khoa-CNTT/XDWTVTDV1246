<div class="slider-items">
    @php
        // Lấy banner đầu tiên trong collection nếu có
        $first_banner = $banner->first();
        $product_images = $first_banner ? explode('*', $first_banner->images) : [];
    @endphp
    @foreach ($product_images as $product_image )
    <div class="slider-item">
        <img src="{{asset($product_image)}}" alt="">
    </div>
    
    @endforeach
</div>
<div class="slider-arrow" style="display: none;">
<i class="ri-arrow-right-fill"></i>
<i class="ri-arrow-left-fill"></i>
</div>