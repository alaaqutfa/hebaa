<!DOCTYPE html>
<html class="dark" dir="{{ session('lang_direction', 'rtl') }}" lang="{{ session('lang_code', 'en') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @stack('meta')

    <title>@yield('title')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/fonts/merriweather.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/fonts/tajawal.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/intlTelInput.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/tailwind.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/auth/app.css') }}" />
    @stack('links')

    <style>
        * {
            font-family: {!! session('lang_direction') == 'rtl' ? "'Tajawal'" : "'Merriweather'" !!};
        }
    </style>


    <!-- Vendor Scripts -->
    <script src="{{ asset('assets/vendor/js/intlTelInput.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/toast.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/vue.global.js') }}"></script>
</head>

<body>

    <!-- App -->
    <div id="app" class="auth-card">

        <div class="auth-card-container">
            <div class="auth-card-content">
                <div class="img">
                    <img aria-hidden="true" onerror="this.src='{{ asset('assets/img/placeholder.jpg') }}'"
                        src="{{ asset('assets/img/articles/auth-img.jpg') }}" alt="Office" />
                </div>
                <div class="content">
                    @yield('content')
                    <div class="action mt-6 text-gray-800 dark:text-white">
                        <button class="" @click="toggleTheme" aria-label="Toggle color mode">
                            <template v-if="!dark">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                                </svg>
                            </template>
                            <template v-if="dark">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </template>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div id="toast-container"></div>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/auth/app.js') }}"></script>
    <script>
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
</body>

</html>
