@extends('frontend.layouts.app')

@section('title', __('Withdraw Request Submit'))
@section('page_name', 'dashboard-withdraw-request-s')

@push('after-styles')
    <link href="{{ asset('assets/frontend/css/dashboard-withdraw-request.css') }}" rel="stylesheet" type="text/css" />  
@endpush

@section('content')
<section class="frame-parent">
    <div class="frame-wrapper">
      <div class="frame-container" id="frameContainer">
        <div class="frame-div">
          <div class="clock-wrapper">
            <img
              class="clock-icon"
              loading="lazy"
              alt=""
              src="{{ asset('assets/frontend/img/clock.svg') }}"
            />
          </div>
        </div>
        <div class="frame-parent1">
          <div class="your-request-submitted-wrapper">
            <b class="your-request-submitted">Your request submitted</b>
          </div>
          <div class="we-are-processing">
            We are processing your request and you will receive your funds
            as soon as possible. Please bear in mind that transaction times
            will be dierent depending on the payment system used.
          </div>
        </div>
        <button class="long-cta">
          <div class="save-wrapper">
            <b class="save">Back To Home</b>
          </div>
        </button>
      </div>
    </div>
  </section>
@endsection
@push('after-scripts')
@endpush
