<x-app-layout>
    
    <section class="admin">
        <div class="row-grid">
            <div class="admin-sidebar">
                    @include('admin.parts.sidebar')
            </div>
            <div class="admin-content">
                <div class="admin-content-main">
                    <div class="admin-content-main-title">
                        <h1>{{ isset($title) ? $title : 'Dashboard' }}</h1>

                    </div>
                    <div class="admin-content-main-content">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    <footer>
        @include('admin.parts.footeradmin')
    </footer>
    <script src="{{asset('admin/js/ajax.js')}}"></script>
</x-app-layout>
