<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Trang Chủ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <section style="max-height: 100%;max-width: 100%;overflow: hidden;aspect-ratio: 2.21/1;position: relative;"class="slider">
                       @include('part.slides')                         
                    </section>

                </div>
            </div>
        </div>
    </div>
    <div class="p-6 text-gray-900">
        {{ __("You're logged in!") }}
    </div>
    @push('scripts')
    @endpush
</x-app-layout>


<style>
    .slider-item {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
    }

    .slider-items {
        position: relative;
        width: 100%;
        height: 100%;
    }
</style>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const items = document.querySelectorAll(".slider-item");
        let currentIndex = 0;

        function showSlide(index) {
            items.forEach((item, i) => {
                item.style.opacity = i === index ? "1" : "0";
                item.style.transition = "opacity 1s ease-in-out";
            });
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % items.length;
            showSlide(currentIndex);
        }

        // Khởi tạo
        showSlide(currentIndex);
        setInterval(nextSlide, 3000); // Đổi ảnh mỗi 3s
    });
</script>
<footer>
    @include('part.footer')
</footer>