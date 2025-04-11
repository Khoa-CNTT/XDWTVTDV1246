<div class="container">
    <div class="row-flex">
        <div class="header-bar-icon">
            <i class="ri-menu-line"></i>
        </div>
        <div class="header-logo">
            <img class="logo" src="{{ asset('frontend/asset/images/logo.png') }}" alt="">
        </div>
        <div class="header-logo-mobile">
            <img class="logo" src="{{ asset('frontend/asset/images/logo.png') }}" alt="">
        </div>
        <div class="header-nav">
            <nav>
                <ul>
                    <li><a href="/home">Trang Chủ</a></li>
                    <li><a href="/shop">Sản Phẩm</a></li>
                    <li><a href="#">Acer</a></li>
                    <li><a href="/shop/asus">ASUS</a></li>
                    <li><a href="#">HP</a></li>
                    <li><a href="#">Lenovo</a></li>
                </ul>
            </nav>
        </div>
        <div class="header-search">
            <input type="text" placeholder="Tìm Kiếm">
            <i class='bx bx-search'></i>
        </div>
        <div class="header-cart">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                            Login        
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                      Register
                            </a>
                        @endif
                    @endauth

                </nav>
            @endif
        </div>
    </div>
</div>
