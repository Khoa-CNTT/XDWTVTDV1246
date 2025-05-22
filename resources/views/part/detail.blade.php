@extends('history')
@section('content')
    <div class="admin-content-main-content-order-list">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ảnh</th>
                    <th>Tên</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td><img style="width: 70px;margin-left: 40% " src="{{ asset($product->avatar) }}" alt="">
                        </td>
                        <td>{{ $product->Name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
   <div class="thongbao" style="text-align: center; color: red; font-size: 20px;">
     @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
   </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h2 class="text-center mb-4 text-lg font-semibold">Đánh Giá - Góp Ý</h2>

                    <form action="/order/review" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="product_id" value="{{ $product->id }}"> <!-- Truyền product_id -->
                        <textarea id="commentInput" placeholder="Viết bình luận..." required
                            class="w-full h-20 p-2 border border-gray-300 rounded resize-y text-sm" name="review" id=""
                            value="{{ old('review') }}"></textarea>
                        <button type="submit"
                            class="mt-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition"
                            style="color: black;border: 1px solid black; ">Gửi
                            bình luận</button>
                        @csrf
                    </form>

                    <div id="comments" class="mt-6 border-t border-gray-300 pt-4">
                        <!-- Bình luận sẽ hiện ở đây -->
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
