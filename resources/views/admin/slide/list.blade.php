@extends('admin.dashboard')
@section('content')
<div class="admin-content-main-content-product-list">
    <div class="table-heght">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Banner</th>
                                        
                                        <th>Tùy Chỉnh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($banner as $banner)
                                    <tr>
                                        <td>{{$banner -> id}}</td>
                                        
                                        <td>
                                            <div class="product-image-banner">
    
                                                @php
                                                    $product_images = explode('*',$banner -> images);
                                                @endphp
                                                @foreach ($product_images as $product_image )
                                                <img style="width: 70px;" src="{{asset($product_image)}}" alt="">
                                                @endforeach
                                            </div>
                                        </td>
                                        
                                        <td>
                                            <a class="edit-class" href="/admin/slide/edit/{{$banner -> id}}">Sửa</a>
                                            <a onclick="removeRowSLDER(banner=<?php echo $banner -> id?>,url='/admin/slide/delete')" class="delete-class" href="">Xóa</a>
                                             </td>

                                    </tr>  
                                    @endforeach
                                    
                                    
                                </tbody>
                            </table>
                        </div>
    </div>
@endsection