@extends('admin.dashboard')
@section('content')
<form action="/admin/product/add" enctype="multipart/form-data" method="post">
    <div class="admin-content-main-content-product-add">
        <div class="admin-content-main-content-left">
            <div class="admin-content-main-content-left-item">
                <div class="admin-content-main-content-two-input">
                    <input name="Name" value="{{old('Name')}}" type="text" placeholder="Tên căn hộ">
                </div>
                <div class="admin-content-main-content-two-input">
                    <input name="Address" value="{{old('Address')}}" type="text" placeholder="Địa chỉ">
                    <input name="Star_rating" value="{{old('Star_rating')}}" type="text" placeholder="Sao đánh giá">
                </div>
                <div class="admin-content-main-content-two-input">
                    <input name="Price_nomal" value="{{old('Price_nomal')}}" type="text" placeholder="Giá thuê">
                    <input name="Price_sale" value="{{old('Price_sale')}}" type="text" placeholder="Giá giảm">
                </div>
                <div class="admin-content-main-content-two-input">
                    <input name="Phone" value="{{old('Phone')}}" type="text" placeholder="Số điện thoại">
                    <input name="Gmail" value="{{old('Gmail')}}" type="email" placeholder="Gmail">
                </div>
                <textarea name="Description" id="" value="{{old('Description')}}" placeholder="Đặc điểm nổi bật"></textarea>
                <textarea name="Content" id="" value="{{old('Content')}}" placeholder="Mô tả Căn hộ"></textarea>
            </div>
            <button type="submit" class="main-btn">Thêm Căn Hộ</button>
           
        </div>
        
    <div class="admin-content-main-content-right">
        <div class="admin-content-main-content-image">
            <label for="file"><i class="ri-folder-image-line"></i> Ảnh Đại Diện</label>
            <input type="file" id="file" name="file">
            <input type="hidden" name="avatar" id="input-file-img-hiden">
            <div class="image-show" id="input-file-img">
        </div>
            
        </div>
        <div class="admin-content-main-content-images">
            <label for="files"><i class="ri-folder-image-line"></i>Ảnh Sản Phẩm</label>
            <input type="file" name="images" id="files" multiple>
            <div class="image-show" id="input-file-imgs">
                 
        </div>
    </div>
</div>
</div>

@csrf
</form>
                    
@endsection
