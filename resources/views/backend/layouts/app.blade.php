<!doctype html>
<html lang="{{ htmlLang() }}" @langrtl dir="rtl" @endlangrtl>
    <head>
        <meta charset="utf-8" />
        <title>{{ appName() }} | Admin | @yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="@yield('meta_description', appName())">
        <meta name="author" content="@yield('meta_author', 'Asifali Maknojiya')">
        @yield('meta')

        @stack('before-styles')
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/backend/images/favicon.ico')}}">

        <!-- Bootstrap Css -->
        <link href="{{asset('assets/backend/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('assets/backend/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('assets/backend/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
        
        <link href="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />

        @stack('page-styles')
        @livewireStyles
        @stack('after-styles')
    </head>
    <body data-sidebar="light">
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->
        <!-- Begin page -->
        <div id="layout-wrapper">
            @include('backend.includes.header')
            <!-- ========== Left Sidebar Start ========== -->
            @include('backend.includes.sidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">@yield('page-title')</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            @includeIf('includes.partials.breadcrumbs')
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        @include('includes.partials.messages')
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <!-- end account-pages -->

        @stack('before-scripts')

        <!-- JAVASCRIPT -->
        <script src="{{asset('assets/backend/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/backend/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/backend/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('assets/backend/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('assets/backend/libs/node-waves/waves.min.js')}}"></script>
        <script src="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.js')}}"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        
        @livewireScripts
        <!-- App js -->
        <script src="{{asset('assets/backend/js/app.js')}}"></script>
        <script src="{{asset('assets/backend/js/developer.js')}}"></script>
        @stack('after-scripts')
    </body>
</html>
