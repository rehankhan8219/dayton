@extends('frontend.layouts.app')

@section('title', __('Login'))
@section('page_name', 'member-area-login')

@push('after-styles')
    <link href="{{asset('assets/frontend/css/login.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
   <section class="long-c-t-a-wrapper">
    <x-forms.post :action="route('admin.auth.login')" class="long-c-t-a">
      <div class="welcome-back-parent">
        <b class="welcome-back">Welcome Back!</b>
        <div class="please-sign-in">Please sign in to your account</div>
      </div>
      <div class="frame-group">
        <div class="field-parent">
          <div class="field">
            <div class="unit">Email</div>
            <div class="rectangle-parent">
              <div class="frame-item active"></div>
              {{ html()->text('username')
                ->class('input-unit')
                ->placeholder('james@daytonfintech.com')
                ->autofocus()
                ->attribute('autocomplate', uniqid())
                ->maxlength(191)
                ->required() }}
            </div>
          </div>
          <div class="field1">
            <div class="unit1">Password</div>
            <div class="rectangle-group">
              <div class="frame-item"></div>
              {{ html()->password('password')
                    ->class('field-password')
                    ->placeholder(__('Enter Password'))
                    ->attribute('id', 'login_field_password')
                    ->attribute('autocomplate', uniqid())
                    ->maxlength(191)
                    ->required() }}

              <div class="vuesaxlineareye-wrapper">
                <button class="btn btn-transparent p-0" type="button" id="login_field_password_visible_toggler"><i
                    class="mdi mdi-eye-outline"></i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="forget-password">
            <x-utils.link :href="route($redirectBase.'.auth.password.request')" :text="__('Forgot Password?')" class="text-muted" icon="" />
        </div>
      </div>
      <button class="long-cta-wrapper" type="submit">
        <div class="long-cta">
          <div class="save-wrapper">
            <b class="save">Sign In</b>
          </div>
        </div>
      </button>
      <div class="dont-have-an-account-sign-up-wrapper">
        <div class="dont-have-an-container" id="dontHaveAn">
          <span class="dont-have-an-account">
            <span class="dont-have-an">Don't have an account? <x-utils.link :href="route('frontend.auth.register')" :text="__('Sign Up')" class="sign-up sign-up1" /></span>
            <span class="span"> </span>
          </span>
        </div>
      </div>
    </x-forms.post>
  </section>
@endsection
@push('after-scripts')
<script type="text/javascript">
  $(document).ready(function() {
      $("#login_field_password_visible_toggler").click(function() {
        var login_field_password = $("#login_field_password");
        if (login_field_password.attr("type") === "password") {
          login_field_password.attr("type", "text");
        } else {
          login_field_password.attr("type", "password");
        }
      });
    });
</script>
@endpush
