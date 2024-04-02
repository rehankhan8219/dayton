@extends('frontend.layouts.app')

@section('title', __('Sign up'))
@section('page_name', 'member-area-sign-up')

@push('after-styles')
    <link href="{{asset('assets/frontend/css/signup.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
   <section class="sign-up-c-t-a-wrapper">
    <form class="sign-up-c-t-a">
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
            <div class="confirm-password-input-field"></div>
            <input
              class="enter-your-name"
              placeholder="Enter your name"
              type="text"
            />
          </div>
        </div>
        <div class="phone-number-input-field1">
          <div class="unit1">Email</div>
          <div class="rectangle-parent">
            <div class="frame-inner"></div>
            <input
              class="enter-your-email"
              placeholder="Enter your email"
              type="text"
            />
          </div>
        </div>
        <div class="phone-number-input-field2">
          <div class="unit2">Phone Number</div>
          <div class="rectangle-group">
            <div class="rectangle-div"></div>
            <input
              class="enter-your-phone"
              placeholder="Enter your phone number"
              type="text"
            />
          </div>
        </div>
        <!-- <div class="field" id="fieldContainer">
          <div class="country">Country</div>
          <div class="rectangle-container">
            <div class="frame-child1"></div>
            <div class="indonesia">Indonesia</div>
            <div class="arrow-down-wrapper">
              <img
                class="arrow-down-icon"
                alt=""
                src="{{ asset('assets/frontend/img/arrowdown.svg') }}"
              />
            </div>
          </div>
        </div> -->

        <div class="field signup-selectbox-field">
          <div class="country">Country</div>
          <div class="rectangle-container">
            <select class="form-control frame-child-selectbox">
                <option value="">Country</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Malaysia">Malaysia</option>
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
            <div class="frame-child2"></div>
            <input
              class="enter-your-password"
              placeholder="Enter your password"
              type="text"
            />

            <div class="vuesaxlineareye-wrapper">
              <img
                class="vuesaxlineareye-icon"
                alt=""
                src="{{ asset('assets/frontend/img/vuesaxlineareye.svg') }}"
              />
            </div>
          </div>
        </div>
        <div class="phone-number-input-field4">
          <div class="unit4">Confirm Password</div>
          <div class="rectangle-parent1">
            <div class="frame-child3"></div>
            <input
              class="enter-your-password1"
              placeholder="Enter your password again"
              type="text"
            />

            <div class="vuesaxlineareye-container">
              <img
                class="vuesaxlineareye-icon1"
                alt=""
                src="{{ asset('assets/frontend/img/vuesaxlineareye-1.svg') }}"
              />
            </div>
          </div>
        </div>
        <div class="phone-number-input-field5">
          <div class="upline-code">Upline Code</div>
          <div class="rectangle-parent2">
            <div class="frame-child4"></div>
            <input
              class="enter-your-upline"
              placeholder="Enter your Upline Code"
              type="text"
            />

            <div class="vuesaxlineareye-frame">
              <img
                class="vuesaxlineareye-icon2"
                alt=""
                src="{{ asset('assets/frontend/img/vuesaxlineareye-1.svg') }}"
              />
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
@endpush
