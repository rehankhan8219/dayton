@extends('frontend.layouts.app')

@section('title', __('Reset Password'))
@section('page-title', __('Reset Password'))
@section('page-description', 'Enter new password for ' . appName() . ' & reset it.')
@section('page_name', 'member-area-login')
@push('after-styles')
    <link href="{{ asset('assets/frontend/css/login.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/frontend/css/signup.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('content')
    <section class="long-c-t-a-wrapper">
        <x-forms.post :action="route($redirectBase . '.auth.password.update')" class="long-c-t-a">
            {{ html()->hidden('token', $token) }}
            <div class="welcome-back-parent">
                <b class="welcome-back">Reset Password</b>
                <div class="please-sign-in">Reset your password with Dayton</div>
            </div>
            <div class="phone-number-input-field1">
                <div class="unit1">Email</div>
                <div class="rectangle-parent">
                    <div class="frame-inner frame-item"></div>
                    {{ html()->email('email', $email)
                        ->class('enter-your-email')
                        ->placeholder(__('Enter your email'))
                        ->maxlength(191)
                        ->required()
                        ->attribute('autocomplate', 'email') }}
                </div>
            </div>
            <div class="phone-number-input-field3">
                <div class="unit3">Password</div>
                <div class="group-div">
                    <div class="frame-child2 frame-item"></div>
                    {{ html()->password('password')
                        ->class('enter-your-password')
                        ->placeholder(__('Enter your password'))
                        ->maxlength(191)
                        ->required()
                        ->attribute('autocomplate', 'new-password') }}
                    <div class="vuesaxlineareye-wrapper">
                        <button class="btn btn-transparent p-0" type="button" style="display: contents;"><i
                                class="mdi mdi-eye-outline password_visible_toggler" data-id="password"
                                id="register_field_password_visible_toggler"></i></button>
                    </div>
                </div>
            </div>

            <div class="phone-number-input-field4">
                <div class="unit4">Confirm Password</div>
                <div class="rectangle-parent1">
                    <div class="frame-child3 frame-item"></div>
                    {{ html()->password('password_confirmation')
                        ->class('enter-your-password1')
                        ->placeholder(__('Enter your password again'))
                        ->maxlength(191)
                        ->required()
                        ->attribute('autocomplate', 'new-password') }}
                    <div class="vuesaxlineareye-wrapper">
                        <button class="btn btn-transparent p-0" type="button" style="display: contents;"><i
                                class="mdi mdi-eye-outline password_visible_toggler" data-id="password-confirm"
                                id="register_field_confirm_password_visible_toggler"></i></button>
                    </div>
                </div>
            </div>
            <button class="long-cta" type="submit">
                <div class="save-wrapper">
                    @lang('Reset Password')
                </div>
            </button>
        </x-forms.post>
    </section>
@endsection
@section('footer')
    <p>Remember your password ? <x-utils.link :href="route($redirectBase . '.auth.login')" :text="__('Login now')" class="fw-medium text-primary" /></p>
@endsection
