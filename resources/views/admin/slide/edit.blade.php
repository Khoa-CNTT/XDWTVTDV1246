@extends('admin.dashboard')
@section('content')
    <form action="" enctype="multipart/form-data" method="post">
        <div class="admin-content-main-content-product-add">
            <div class="admin-content-main-content-images">
                <label for="files"><i class="ri-folder-image-line"></i>Ảnh Banner</label>
                <br>
                <input type="file" name="images" id="files" multiple>
                <br>
                <div class="image-show" id="input-file-imgs">
                    @php
                        $product_images = explode('*', $banner->images);
                    @endphp
                    @foreach ($product_images as $product_image)
                        <img src="{{ asset($product_image) }}" alt="">
                        <input type="hidden" name="images[]" value="{{ $banner->image }}" id="input-file-img-hiden">
                    @endforeach
                </div>

                <br>
                <br>
                <br>
                <br>
                <br>
                <button type="submit" class="main-btn">Cập Nhật Banner</button>
            </div>
        </div>
        

        @csrf
    </form>
@endsection
