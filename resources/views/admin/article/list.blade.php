@extends('admin.dashboard')
@section('content')
<div class="admin-content-main-content-product-list">
    <div class="table-heght">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Content</th>
                                        
                                        <th>Tùy Chỉnh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($article as $article)
                                    <tr>
                                        <td>{{$article->id}}</td>
                                        
                                        <td>
                                            {{$article->Content}}
                                        </td>
                                        
                                        <td>
                                            <a class="edit-class" href="/admin/article/edit/{{$article -> id}}">Sửa</a>
                                             </td>
                                    </tr>  
                                    @endforeach
                                    
                                    
                                </tbody>
                            </table>
                        </div>
    </div>
@endsection