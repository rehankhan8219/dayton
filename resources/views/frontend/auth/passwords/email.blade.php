@extends('backend.layouts.auth')

@section('title', __('Reset Password'))
@section('page-title', __('Reset Password'))
@section('page-description', 'Reset your password with ' . appName())
@section('content')
    <x-forms.post :action="route('admin.auth.password.email')" class="form-horizontal">
        <div class="mb-3">
            {{ html()->label(__('E-Mail Address'))->class('form-label')->for('email') }}
            {{ html()->email('email')->class('form-control')->placeholder(__('Enter E-Mail Address'))->autofocus()->attribute('autocomplate', 'email')->maxlength(191)->required() }}
        </div>
        <div class="mt-3 d-grid">
            <button class="btn btn-primary waves-effect waves-light" type="submit">@lang('Send Password Reset Link')</button>
        </div>
    </x-forms.post>
@endsection
@section('footer')
    <p>Remember your password ? <x-utils.link :href="route('admin.auth.login')" :text="__('Login now')" class="fw-medium text-primary" /></p>
@endsection
