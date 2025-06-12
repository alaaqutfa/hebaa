<!DOCTYPE html>
<html :class="dark ? 'dark' : ''" dir="{{ session('lang_direction', 'rtl') }}" lang="{{ session('lang_code', 'en') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title') | {{ translation(getSetting('site_title')) }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/fonts/merriweather.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/fonts/tajawal.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('assets/vendor/css/intlTelInput.min.css') }}" /> --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/tailwind.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/aos/aos.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/admin/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/web/main.css') }}" />
    @stack('links')

    <style>
        * {
            font-family: {!! session('lang_direction') == 'rtl' ? "'Tajawal'" : "'Merriweather'" !!};
        }
    </style>

    <!-- Scripts -->
    {{-- <script src="{{ asset('assets/vendor/js/intlTelInput.min.js') }}"></script> --}}
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/toast.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/focus-trap.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/vue.global.js') }}"></script>
</head>

<body>

    <!-- App -->
    <div id="app">

        <!-- SideBar -->
        @include('admin.layouts.partials.sidebar')

        <div class="admin-content">
            <!-- Header -->
            @include('admin.layouts.partials.header')
            <!-- Main -->
            <main id="main">
                @yield('content')
            </main>
        </div>

        <!-- Footer -->
        @include('admin.layouts.partials.footer')

        @yield('modal')

    </div>

    <div id="toast-container"></div>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" height="22" width="14" fill="#FFF" viewBox="0 0 384 512">
            <path
                d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2 160 448c0 17.7 14.3 32 32 32s32-14.3 32-32l0-306.7L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z" />
        </svg>
    </a>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/admin/app.js') }}"></script>
    <script src="{{ asset('assets/js/web/main.js') }}"></script>
    <script>
        @if (session('success'))
            showToast("{{ translation(session('success')) }}", 'success');
        @endif

        @if (session('message'))
            showToast("{{ translation(session('message')) }}", 'success');
        @endif

        @if (session('error'))
            showToast("{{ translation(session('error')) }}", 'error');
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                showToast("{{ translation($error) }}", 'error');
            @endforeach
        @endif
    </script>
    @stack('scripts')
</body>

</html>
