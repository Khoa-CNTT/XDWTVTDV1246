<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Giao Dịch Thanh Toán') }}
        </h2>
    </x-slot>

<section class="product-detail p-to-top">
   <div class="admin-content-main-content">
        @yield('content')
    </div>
</section>


</x-app-layout>
<footer>
    @include('part.footer')
</footer>