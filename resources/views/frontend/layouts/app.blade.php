<!doctype html>
<html lang="{{ htmlLang() }}" @langrtl dir="rtl" @endlangrtl>
    <head>
        <meta charset="utf-8" />
        <title>{{ appName() }} | @yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="@yield('meta_description', appName())">
        <meta name="author" content="@yield('meta_author', 'Asifali Maknojiya')">
        @yield('meta')

        @stack('before-styles')
        <link rel="shortcut icon" href="{{ asset('assets/frontend/img/group-2.svg') }}">
        <link href="{{asset('assets/backend/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/frontend/css/style.css')}}" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700&display=swap" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Helvetica:wght@400&display=swap" />
        <link href="{{asset('assets/frontend/css/global.css')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700&display=swap"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Plus Jakarta Sans:wght@400;500;600;700&display=swap" />

        @stack('page-styles')

        @stack('after-styles')
    </head>
    <body>
        <div class="@yield('page_name')">
            @include('frontend.includes.header')

            @yield('content')

            @include('frontend.includes.footer')
        </div>

        @stack('before-scripts')

        <!-- JAVASCRIPT -->
        <script src="{{asset('assets/backend/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/backend/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

        @stack('after-scripts')

        <script type="text/javascript">
            function toggleMobileMenu() {
            const headerNavMobile = document.querySelector('.header-about-us-parent-for-mobile');
            headerNavMobile.classList.toggle('show-mobile');
          }
        </script>
    </body>
</html>
