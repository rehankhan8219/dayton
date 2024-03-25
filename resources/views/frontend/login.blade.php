@extends('frontend.layouts.app')

@section('title', __('Login'))
@section('page_name', 'member-area-login')

@push('after-styles')
    <link href="{{asset('assets/frontend/css/login.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
   <section class="long-c-t-a-wrapper min_height_for_footer">
    <form class="long-c-t-a">
      <div class="welcome-back-parent">
        <b class="welcome-back">Welcome Back!</b>
        <div class="please-sign-in">Please sign in to your account</div>
      </div>
      <div class="frame-group">
        <div class="field-parent">
          <div class="field">
            <div class="unit">Email</div>
            <div class="rectangle-parent">
              <div class="frame-item"></div>
              <input
                class="input-unit"
                placeholder="james@daytonfintech.com"
                type="text"
              />
            </div>
          </div>
          <div class="field1">
            <div class="unit1">Password</div>
            <div class="rectangle-group">
              <div class="frame-inner"></div>
              <input
                class="field-password"
                placeholder="Enter your password"
                type="password"
              />

              <div class="vuesaxlineareye-wrapper">
                <img
                  id="eyeIcon"
                  class="vuesaxlineareye-icon"
                  alt=""
                  src="{{ asset('assets/frontend/img/vuesaxlineareye.svg') }}"
                />
              </div>
            </div>
          </div>
        </div>
        <div class="forget-password">Forget Password?</div>
      </div>
      <button class="long-cta-wrapper" id="frameButton">
        <div class="long-cta">
          <div class="save-wrapper">
            <b class="save">Sign In</b>
          </div>
        </div>
      </button>
      <div class="dont-have-an-account-sign-up-wrapper">
        <div class="dont-have-an-container" id="dontHaveAn">
          <span class="dont-have-an-account">
            <span class="dont-have-an">Don’t have an account? <a href="{{ route('frontend.auth.register') }}"><span class="sign-up sign-up1">Sign Up</span></a></span>
            <span class="span"> </span>
          </span>
        </div>
      </div>
    </form>
  </section>
@endsection
@push('after-scripts')
<script type="text/javascript">


  $(document).on('click', '#eyeIcon', function(){
    alert('hello');
  })
  
  // $(document).ready(function() {
  //     $("#eyeIcon").click(function() {
  //       alert('hello');
  //       // var passwordField = $("#passwordField");
  //       // var eyeIcon = $(this);
  //       // if (passwordField.attr("type") === "password") {
  //       //   passwordField.attr("type", "text");
  //       //   eyeIcon.attr("src", "{{ asset('assets/frontend/img/vuesaxlineareye.svg') }}"); // Change to hidden eye icon image
  //       // } else {
  //       //   passwordField.attr("type", "password");
  //       //   eyeIcon.attr("src", "{{ asset('assets/frontend/img/vuesaxlineareye.svg') }}"); // Change to visible eye icon image
  //       // }
  //     });
  //   });

  // $()
</script>
@endpush
