@extends('admin.dashboard')
@section('content')
<form action="" enctype="multipart/form-data" method="post">
    <div class="admin-content-main-content-product-add">
        <div class="admin-content-main-content-left">
            <div class="admin-content-main-content-left-item">
                <div class="admin-content-main-content-two-input">
                    <input name="Name" value="{{$product -> Name}}" type="text" placeholder="Tên căn hộ">
                    <input name="Region" value="{{$product -> Region}}" type="text" placeholder="Vị Trí">
                </div>
                <div class="admin-content-main-content-two-input">
                    <input name="Address" value="{{$product -> Address}}" type="text" placeholder="Địa chỉ">
                    <input name="Star_rating" value="{{$product -> Star_rating}}" type="text" placeholder="Sao đánh giá">
                </div>
                <div class="admin-content-main-content-two-input">
                    <input name="Price_nomal" value="{{$product -> Price_nomal}}" type="text" placeholder="Giá thuê">
                    <input name="Price_sale" value="{{$product -> Price_sale}}" type="text" placeholder="Giá giảm">
                </div>
                <div class="admin-content-main-content-two-input">
                    <input name="Phone" value="{{$product -> Phone}}" type="text" placeholder="Số điện thoại">
                    <input name="Gmail" value="{{$product -> Gmail}}" type="email" placeholder="Gmail">
                </div>
                <textarea name="Description" placeholder="Đặc điểm nổi bật">{{$product->Description}}</textarea>
                <textarea name="Content" placeholder="Mô tả Căn hộ">{{$product->Content}}</textarea>
                
            </div>
            <button type="submit" class="main-btn">Cập Nhật Sản Phẩm</button>
        </div>
        
    <div class="admin-content-main-content-right">
        <div class="admin-content-main-content-image">
            <label for="file"><i class="ri-folder-image-line"></i> Ảnh Đại Diện</label>
            <input type="file" id="file" name="file">
            <input type="hidden" name="avatar" value="{{$product->avatar}}" id="input-file-img-hiden">
            <div class="image-show" id="input-file-img">
                <img src="{{asset($product -> avatar)}}" alt="">
            </div>
            
        </div>
        <div class="admin-content-main-content-images">
            <label for="files"><i class="ri-folder-image-line"></i>Ảnh Sản Phẩm</label>
            <input type="file" name="images" id="files" multiple>
            <div class="image-show" id="input-file-imgs">
                @php
                    $product_images = explode("*",$product->images);
                @endphp
                @foreach ($product_images as $product_image)
                    <img src="{{asset($product_image)}}" alt="">
                    <input type="hidden" name="images[]" value="{{$product->image}}" id="input-file-img-hiden">
                @endforeach
        </div>
    </div>
</div>
</div>
@csrf
</form>
                    
@endsection
