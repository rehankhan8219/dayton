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

        @stack('page-styles')
        @livewireStyles
        @stack('after-styles')
    </head>
    <body>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">@yield('page-title')</h5>
                                            <p>@yield('page-description')</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="{{asset('assets/backend/images/profile-img.png')}}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="auth-logo">
                                    <a href="{{route('frontend.page.home')}}" class="auth-logo-light">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{asset('assets/backend/images/logo-light.svg')}}" alt="" class="rounded-circle"
                                                    height="34">
                                            </span>
                                        </div>
                                    </a>
                                    <a href="index.html" class="auth-logo-dark">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{asset('assets/backend/images/logo.svg')}}" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    @include('includes.partials.messages')
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <div>
                                @yield('footer')
                                <p>©
                                    <script>document.write(new Date().getFullYear())</script> {{appName()}}.
                                </p>
                            </div>
                        </div>
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
        
        @livewireScripts
        <!-- App js -->
        <script src="{{asset('assets/backend/js/app.js')}}"></script>
        @stack('after-scripts')
    </body>
</html>
