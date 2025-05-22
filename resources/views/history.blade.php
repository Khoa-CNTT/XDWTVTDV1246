<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lịch Sử Đơn Mua') }}

        </h2>

    </x-slot>

    @if (session('success'))
        <div class="alert alert-success" style="text-align: center; color: green; font-size: 20px;">
            {{ session('success') }}
        </div>
    @endif


    <section class="product-detail p-to-top">
        <div class="admin-content-main-content">
            @yield('content')
        </div>
    </section>

</x-app-layout>
