@extends('frontend.layouts.app')

@section('title', __('Reset Password'))
@section('page_name', 'member-area-login')

@push('after-styles')
    <link href="{{asset('assets/frontend/css/login.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
   <section class="long-c-t-a-wrapper">
    <x-forms.post :action="route($redirectBase.'.auth.password.email')" class="long-c-t-a">
      <div class="welcome-back-parent">
        <b class="welcome-back">Reset Password</b>
        <div class="please-sign-in">Reset your password with Dayton</div>
      </div>
      <div class="frame-group">
        <div class="field-parent">
          <div class="field">
            <div class="unit">E-Mail Address</div>
            <div class="rectangle-parent">
              <div class="frame-item active"></div>
                 {{ html()->email('email')->class('input-unit')->placeholder(__('Enter E-Mail Address'))->autofocus()->attribute('autocomplate', 'email')->maxlength(191)->required() }}
            </div>
          </div>
        </div>
      </div>
      <button class="long-cta-wrapper" type="submit">
        <div class="long-cta">
          <div class="save-wrapper">
            <b class="save w-100">@lang('Send Password Reset Link')</b>
          </div>
        </div>
      </button>

      <div class="dont-have-an-account-sign-up-wrapper p-0">
        <div class="dont-have-an-container" id="dontHaveAn">
          <span class="dont-have-an-account">
            <span class="dont-have-an">Remember your password ? <x-utils.link :href="route('frontend.auth.login')" :text="__('Login now')" class="sign-up sign-up1" /></span>
            <span class="span"> </span>
          </span>
        </div>
      </div>

    </x-forms.post>
  </section>
@endsection
@push('after-scripts')
<script type="text/javascript">
</script>
@endpush
