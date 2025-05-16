@extends('admin.dashboard')
@section('content')
    <form action="" enctype="multipart/form-data" method="post">
            <div class="admin-content-main-content-article-add">
                    <h1>Thêm bài viết cho website</h1>
                    <br>
            <textarea class="baiviet" name="Content" placeholder="Bài Viết Chi Tiết">{{$article->Content}}</textarea>
                 
                </div>

            <button style="margin-left: 30px" type="submit" class="main-btn">Thêm Bài Viết</button>
           
        </div>
    
    @csrf
</form>
                    
@endsection