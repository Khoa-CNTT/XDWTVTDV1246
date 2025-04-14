@extends('admin.dashboard')
@section('content')
<form action="/adm/slide/add" enctype="multipart/form-data" method="post">

    <div class="admin-content-main-content-product-add">
        <div class="admin-content-main-content-images">
            <p>Thêm ảnh banner cho Slide</p>
            <label for="files"><i class="ri-folder-image-line"></i>Ảnh BANNER</label>
            <input type="file" name="images" id="files" multiple>
            <div class="image-show" id="input-file-imgs">
                 
        </div>


            <br>
            <br>
            <br>
            <br>
            <br>
            <button type="submit" class="main-btn">Thêm Banner</button>
           
        </div>
    </div>
    @csrf
</form>
                    
@endsection
