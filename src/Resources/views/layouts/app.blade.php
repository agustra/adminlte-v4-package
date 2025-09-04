<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title', 'AdminLTE v4 | Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    
    <!--begin::AdminLTE Assets-->

    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/adminlte-css.css') }}">
    <!--end::AdminLTE Assets-->
    
    @stack('styles')
    
    <!-- Dark Mode Script (prevent flash) -->
    <script>
        (function() {
            const theme = localStorage.getItem('adminlte-theme') || 'light';
            if (theme === 'dark') {
                document.documentElement.setAttribute('data-bs-theme', 'dark');
            }
        })();
    </script>
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        @include('adminlte::partials.header')
        @include('adminlte::partials.sidebar')
        
        <!--begin::App Main-->
        <main class="app-main">
            @include('adminlte::partials.content-header')
            
            <!--begin::App Content-->
            <div class="app-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <!--end::App Content-->
        </main>
        <!--end::App Main-->
        
        @include('adminlte::partials.footer')
    </div>
    <!--end::App Wrapper-->
    
    <!--begin::AdminLTE JavaScript-->
    <script src="{{ asset('vendor/adminlte/js/adminlte.js') }}"></script>
    <!--end::AdminLTE JavaScript-->
    
    @stack('scripts')
</body>
</html>