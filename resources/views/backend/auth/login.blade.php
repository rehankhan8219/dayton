@extends('backend.layouts.auth')

@section('title', 'Login')
@section('page-title', 'Welcome Back !')
@section('page-description', 'Sign in to continue to '.appName())
@section('content')
    <x-forms.post :action="route('admin.auth.login')" class="form-horizontal">
        <div class="mb-3">
            {{ html()->label(__('Username'))->class('form-label')->for('username') }}
            {{ html()->text('username')
                ->class('form-control')
                ->placeholder(__('User ID'))
                ->autofocus()
                ->attribute('autocomplate', 'username')
                ->maxlength(191)
                ->required() }}
        </div>
        <div class="mb-3">
            {{ html()->label(__('Password'))->class('form-label')->for('password') }}
            <div class="input-group auth-pass-inputgroup">
                {{ html()->password('password')
                    ->class('form-control')
                    ->placeholder(__('Enter Password'))
                    ->attribute('autocomplate', 'current-password')
                    ->maxlength(191)
                    ->required() }}
                <button class="btn btn-light " type="button" id="password-addon"><i
                    class="mdi mdi-eye-outline"></i></button>
            </div>
        </div>

        <div class="form-check">
            {{ html()->input('checkbox', 'remember')->id('remember-check')->class('form-check-input') }}
            {{ html()->label(__('Remember me'))->class('form-check-label')->for('remember-check') }}
        </div>

        @if(config('boilerplate.access.captcha.login'))
            <div class="row">
                <div class="col">
                    @captcha
                    <input type="hidden" name="captcha_status" value="true" />
                </div><!--col-->
            </div><!--row-->
        @endif

        <div class="mt-3 d-grid">
            <button class="btn btn-primary waves-effect waves-light" type="submit">@lang('Log In')</button>
        </div>

        {{-- <div class="mt-4 text-center">
            <h5 class="font-size-14 mb-3">Sign in with</h5>

            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="javascript::void()" class="social-list-item bg-primary text-white border-primary">
                        <i class="mdi mdi-facebook"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="javascript::void()" class="social-list-item bg-info text-white border-info">
                        <i class="mdi mdi-twitter"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="javascript::void()" class="social-list-item bg-danger text-white border-danger">
                        <i class="mdi mdi-google"></i>
                    </a>
                </li>
            </ul>
        </div> --}}

        <div class="mt-4 text-center">
            <x-utils.link :href="route($redirectBase.'.auth.password.request')" :text="__('Forgot Your Password?')" class="text-muted" icon="mdi mdi-lock me-1" />
        </div>
    </x-forms.post>
@endsection
@section('footer')
    {{-- <p>Don't have an account ? <x-utils.link :href="route('frontend.auth.password.request')" :text="__('Sign up now')" class="fw-medium text-primary" /></p> --}}
@endsection
