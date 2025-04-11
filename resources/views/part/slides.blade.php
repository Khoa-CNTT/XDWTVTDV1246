<div class="slider-items">
    {{-- @foreach ($slide as $slide)
                                 
                                        <div class="slider-item">
                                            <img src="{{asset($slide -> banner)}}" alt="">
                                        </div>
     @endforeach --}}
        <div class="slider-item">
            <img src="{{asset('frontend/asset/images/banner3.jpg')}}" alt="">
        </div>
        <div class="slider-item">
            <img src="{{asset('frontend/asset/images/banner2.jpg')}}" alt="">
        </div>
        <div class="slider-item">
            <img src="{{asset('frontend/asset/images/banner4.jpg')}}" alt="">
        </div>
        <div class="slider-item">
            <img src="{{asset('frontend/asset/images/banner1.jpg')}}" alt="">
        </div>
    </div>
    <div class="slider-arrow" style="display: none;">
        <i class="ri-arrow-right-fill"></i>
        <i class="ri-arrow-left-fill"></i>
    </div>