@extends('admin.dashboard')
@section('content')
<div class="admin-content-main-content-product-list">
    <div class="table-heght">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Ảnh</th>
                                        <th>Tên Căn Hộ</th>
                                        <th>Địa chỉ</th>
                                        <th>Giá Thuê</th>
                                        <th>Giá Giảm</th>
                                        <th>Ngày Đăng</th>
                                        <th>Tùy Chỉnh</th>
                                    </tr>
                                </thead>
                                
                              
                            
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <td>{{$product -> id}}</td>
                                        <td><img style="width: 70px;" src="{{asset($product -> avatar)}}" alt=""></td>
                                        <td>{{$product -> Name}}</td>
                                        <td>{{$product -> Address}}</td>
                                        <td>{{number_format($product -> Price_nomal)}}</td>
                                        <td>{{number_format($product -> Price_sale)}}</td>
                                        <td>{{$product -> created_at}}</td>
                                        <td>
                                            <a class="edit-class" href="/adm/product/edit/{{$product -> id}}">Sửa</a>
                                            <a onclick="removeRow(product_id=<?php echo $product -> id?>,url='/adm/product/delete')" class="delete-class" href="">Xóa</a>
                                        </td>
                                    </tr>  
                                    @endforeach
                                    
                                    
                                </tbody>
                           
                            </table>
                        </div>
                        </div>
@endsection