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

                    <section
                        style="max-height: 100%;max-width: 100%;overflow: hidden;aspect-ratio: 2.21/1;position: relative;"class="slider">
                        @include('part.slides')
                    </section>

                </div>
            </div>
        </div>
    </div>
   
    <div class="content-name-villa">
        <h1 class="blinking-text">LUSHVILLA</h1>
        <div class="containerrr">
                <section class="why-choose-us">
                <div class="container-fluid-center">
                    <h2>Tại sao chọn Villa của chúng tôi?</h2>
                    <p>Chúng tôi mang đến trải nghiệm nghỉ dưỡng đẳng cấp và thư giãn tuyệt đối cho bạn.</p>
                    <div class="features">
                        <div class="feature">
                            <i data-lucide="map-pin"></i>
                            <i class='bx bxs-map-pin'></i>
                            <h3>Vị trí đắc địa</h3>
                            <p>Tọa lạc tại những vị trí đẹp nhất với view hướng biển hoặc núi tuyệt mỹ.</p>
                        </div>
                        <div class="feature">
                            <i data-lucide="sparkles"></i>
                            <i class='bx bxs-diamond'></i>
                            <h3>Tiện nghi sang trọng</h3>
                            <p>Nội thất và thiết kế sang trọng, hiện đại đảm bảo sự tiện nghi cao cấp nhất.</p>
                        </div>
                        <div class="feature">
                            <i data-lucide="leaf"></i>
                            <i class='bx bx-leaf' ></i>
                            <h3>Không gian xanh</h3>
                            <p>Villa được bao quanh bởi thiên nhiên trong lành, mang đến cảm giác thư thái.</p>
                        </div>
                        <div class="feature">
                            <i data-lucide="concierge-bell"></i>
                            <i class='bx bx-stopwatch' ></i>
                            <h3>Dịch vụ hoàn hảo</h3>
                            <p>Đội ngũ nhân viên phục vụ chuyên nghiệp, sẵn sàng hỗ trợ 24/7.</p>
                        </div>
                    </div>
                </div>
            </section> 
        </div>
    </div>
    <div class="p-6 text-gray-900">
        @include('part.article')
    </div>
    @push('scripts')
    @endpush

   

<script>
    lucide.createIcons();
</script>

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
