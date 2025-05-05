<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        <h1 class="text-2xl font-bold text-center mb-6">Đăng Nhập</h1>
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div  class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Nhớ Mật Khẩu') }}</span>
            </label>
                @if (Route::has('password.request'))
                <a style="margin-left: 150px;color: blue" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Quên Mật Khẩu?') }}
                </a>
            @endif
            
        </div>
        
        <div style="margin-top:50px " class="flex items-center justify-end mt-4">
            <p style="margin-right: 60px" class="text-sm text-gray-600">
                {{ __('Bạn Chưa có Tài Khoản?') }}
                <a style="color: blue" href="{{ route('register') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('Đăng ký') }}
                </a>
            </p>

            <x-primary-button class="ms-3">
                {{ __('Đăng Nhập') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
