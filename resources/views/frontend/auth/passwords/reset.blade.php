@extends('backend.layouts.auth')

@section('title', __('Reset Password'))
@section('page-title', __('Reset Password'))
@section('page-description', 'Enter new password for '.appName().' & reset it.')
@section('content')
    <x-forms.post :action="route($redirectBase.'.auth.password.update')" class="form-horizontal">
        {{ html()->hidden('token', $token) }}
        <div class="mb-3">
            {{ html()->label(__('E-Mail Address'))->class('form-label')->for('email') }}
            {{ html()->email('email', $email)->class('form-control')->placeholder(__('Enter E-Mail Address'))->autofocus()->attribute('autocomplate', 'email')->maxlength(191)->required() }}
        </div>
        <div class="mb-3">
            {{ html()->label(__('Password'))->class('form-label')->for('password') }}
            <div class="input-group auth-pass-inputgroup">
                {{ html()->password('password')
                    ->class('form-control')
                    ->placeholder(__('Enter Password'))
                    ->attribute('autocomplate', 'new-password')
                    ->maxlength(191)
                    ->required() }}
                <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
            </div>
        </div>
        <div class="mb-3">
            {{ html()->label(__('Confirm Password'))->class('form-label')->for('password_confirmation') }}
            <div class="input-group auth-pass-inputgroup">
                {{ html()->password('password_confirmation')
                    ->class('form-control')
                    ->placeholder(__('Re-Enter Password'))
                    ->attribute('autocomplate', 'new-password')
                    ->maxlength(191)
                    ->required() }}
                {{-- <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button> --}}
            </div>
        </div>
        <div class="mt-3 d-grid">
            <button class="btn btn-primary waves-effect waves-light" type="submit">@lang('Reset Password')</button>
        </div>
    </x-forms.post>
@endsection
@section('footer')
    <p>Remember your password ? <x-utils.link :href="route('admin.auth.login')" :text="__('Login now')" class="fw-medium text-primary" /></p>
@endsection
