@extends('frontend.layouts.app')

@section('title', __('Sign up'))
@section('page_name', 'member-area-sign-up')

@push('after-styles')
    <link href="{{asset('assets/frontend/css/signup.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
   <section class="sign-up-c-t-a-wrapper">
    <form class="sign-up-c-t-a" action="">
        @csrf
      <div class="frame-group">
        <img
          class="frame-item"
          loading="lazy"
          alt=""
          src="{{ asset('assets/frontend/img/group-3.svg') }}"
        />

        <div class="a-parent">
          <img class="a-icon" loading="lazy" alt="" src="{{ asset('assets/frontend/img/a.svg') }}" />

          <div class="b-wrapper">
            <img
              class="b-icon"
              loading="lazy"
              alt=""
              src="{{ asset('assets/frontend/img/b.svg') }}"
            />
          </div>
          <div class="confirm-password-field">
            <img
              class="c-icon"
              loading="lazy"
              alt=""
              src="{{ asset('assets/frontend/img/c.svg') }}"
            />
          </div>
          <div class="sign-in-c-t-a">
            <div class="d-parent">
              <img
                class="d-icon"
                loading="lazy"
                alt=""
                src="{{ asset('assets/frontend/img/d.svg') }}"
              />

              <img
                class="group-icon1"
                loading="lazy"
                alt=""
                src="{{ asset('assets/frontend/img/group-1.svg') }}"
              />
            </div>
          </div>
        </div>
      </div>
      <div class="get-your-dayton-account-parent">
        <h3 class="get-your-dayton">Get Your Dayton Account!</h3>
        <div class="please-fill-in">
          Please fill in the form to continue
        </div>
      </div>
      <div class="email-input-field">
        <div class="phone-number-input-field">
          <div class="unit">Name</div>
          <div class="confirm-password-input-field-parent">
            <div class="confirm-password-input-field frame-item active"></div>
            <input id="name" type="text" placeholder="Enter your name" class="enter-your-name @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
          </div>

           @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <div class="phone-number-input-field1">
          <div class="unit1">Email</div>
          <div class="rectangle-parent">
            <div class="frame-inner frame-item"></div>
            <input id="email" type="email" class="enter-your-email @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your email" required autocomplete="email">
          </div>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="phone-number-input-field2">
          <div class="unit2">Phone Number</div>
          <div class="rectangle-group">
            <div class="rectangle-div frame-item"></div>
            <input class="enter-your-phone" placeholder="Enter your phone number" type="text" />
          </div>
        </div>

        <div class="field signup-selectbox-field">
          <div class="country">Country</div>
          <div class="rectangle-container">
            <select class="form-control frame-child-selectbox">
                <option value="">Country</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Malesiya">Malesiya</option>
                <option value="Singapore">Singapore</option>
                <option value="Vietnam">Vietnam</option>
                <option value="Phillipine">Phillipine</option>
                <option value="Thailand">Thailand</option>
            </select>
            <div class="custom-caret">
              <img class="arrow-down-icon" alt="" src="{{ asset('assets/frontend/img/arrowdown.svg') }}">
            </div>
          </div>
        </div>


        <div class="phone-number-input-field3">
          <div class="unit3">Password</div>
          <div class="group-div">
            <div class="frame-child2 frame-item"></div>
            <input id="password" type="password" class="enter-your-password @error('password') is-invalid @enderror" name="password" placeholder="Enter your password" required autocomplete="new-password">
            <div class="vuesaxlineareye-wrapper">
                <button class="btn btn-transparent p-0" type="button" style="display: contents;"><i
                    class="mdi mdi-eye-outline password_visible_toggler" data-id="password" id="register_field_password_visible_toggler"></i></button>
              </div>
          </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="phone-number-input-field4">
          <div class="unit4">Confirm Password</div>
          <div class="rectangle-parent1">
            <div class="frame-child3 frame-item"></div>
                <input id="password-confirm" type="password" class="enter-your-password1" name="password_confirmation" required autocomplete="new-password" placeholder="Enter your password again">
                <div class="vuesaxlineareye-wrapper">
                    <button class="btn btn-transparent p-0" type="button" style="display: contents;"><i
                        class="mdi mdi-eye-outline password_visible_toggler" data-id="password-confirm" id="register_field_confirm_password_visible_toggler"></i></button>
                </div>
          </div>
        </div>

        <div class="phone-number-input-field5">
          <div class="upline-code">Upline Code</div>
          <div class="rectangle-parent2">
            <div class="frame-child4 frame-item"></div>
            <input
              id="upline_code"
              class="enter-your-upline"
              placeholder="Enter your Upline Code"
              type="password"
              name="upline_code"
            />

            <div class="vuesaxlineareye-wrapper">
                <button class="btn btn-transparent p-0" type="button" style="display: contents;"><i
                    class="mdi mdi-eye-outline password_visible_toggler" data-id="upline_code" id="register_field_upline_visible_toggler"></i></button>
            </div>
          </div>
        </div>
      </div>
      <div class="enter-email-label">
        <div class="enter-phone-number-label">
          <button class="long-cta" id="longCTA">
            <div class="save-wrapper">
              <b class="save">Sign Up</b>
            </div>
          </button>
          <div class="already-have-an-account-sign-wrapper">
            <div class="already-have-an-container" id="alreadyHaveAn">
              <span class="already-have-an-account">
                <span class="already-have-an"
                  >Already have an account?</span
                >
                <span class="span"> </span>
              </span>
             <a href="{{ route('frontend.auth.login') }}"><span class="sign-in">Sign In</span></a>
            </div>
          </div>
        </div>
      </div>
    </form>
  </section>
@endsection
@push('after-scripts')
<script type="text/javascript">
    $(document).ready(function() {
        
       $(".password_visible_toggler").click(function() {
            var id = $(this).data('id');

            var password = $("#"+id);
            if (password.attr("type") === "password") {
              password.attr("type", "text");

              $(this).removeClass('mdi-eye-outline');
              $(this).addClass('mdi-eye-off-outline');

            } else {
              password.attr("type", "password");
              $(this).addClass('mdi-eye-outline');
              $(this).removeClass('mdi-eye-off-outline');
            }
      });


      $(document).on("focus", "input, select", function() {
        $(".frame-item").removeClass("active");
        $(this).parent().find(".frame-item").addClass("active");
      });
    });
</script>
@endpush
