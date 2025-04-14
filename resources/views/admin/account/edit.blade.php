@extends('admin.dashboard')
@section('content')
    <form action="" enctype="multipart/form-data" method="post">

        <div class="admin-content-main-content-product-add">
            <div class="admin-content-main-content-left">
                <div class="admin-content-main-content-left-item">

                    <h3 style="color: black;font-weight: bold;">Tên Tài Khoản</h3>
                    <div class="admin-content-main-content-two-input">
                        <input name="name" value="{{ $user->name }}" type="text" placeholder="Tên ">
                    </div>

                    <h3 style="color: black;font-weight: bold;">Email</h3>
                    <div class="admin-content-main-content-two-input">
                        <input name="email" value="{{ $user->email }}" type="email" placeholder="email">
                    </div>
                    <h3 style="color: black;font-weight: bold;">Mật Khẩu</h3>
                    <div class="admin-content-main-content-two-input">
                        <input name="password" value="{{ $user->password }}" type="password" placeholder="Mật khẩu">
                    </div>
                </div>
               
                <button type="submit" class="main-btn">Cấp Quyền</button>
            </div>
            <div class="admin-content-main-content-right">
                <h3 style="color: black;font-weight: bold;">Quyền Muốn Cấp</h3>
                <select name="usertype" id="usertype" style="border-radius: 10px">
                    <option value="user" {{ $user->usertype == 'user' ? 'selected' : '' }}>Tài Khoản Người dùng</option>
                    <option value="employee" {{ $user->usertype == 'employee' ? 'selected' : '' }}>Tài Khoản Nhân Viên</option>
                    <option value="admin" {{ $user->usertype == 'admin' ? 'selected' : '' }}>Quản trị viên</option>
                </select>
                
            </div>
        </div>
        @csrf
    </form>
@endsection
