@extends('admin.dashboard')
@section('content')
<div class="admin-content-main-content-order-list">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        {{-- <th>Password</th> --}}
                                        <th>UserType</th>
                                        <th>Cấp Quyền</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $u)
                                    <tr>
                                        <td>{{ $u->id }}</td>
                                        <td>{{ $u->name }}</td>
                                        <td>{{ $u->email }}</td>
                                        {{-- <td>{{ $u->password }}</td> --}}
                                        <td>{{ $u->usertype }}</td>
                                        <td> <a class="edit-class" href="/admin/account/edit/{{ $u->id }}">Sửa</a></td>
                                        <td>
                                            <a onclick="removeRow(user_id=<?php echo $u->id?>,url='/admin/account/delete')" class="delete-class" href="">Xóa</a>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                                
                                </tbody>
                            </table>
                        </div>
@endsection