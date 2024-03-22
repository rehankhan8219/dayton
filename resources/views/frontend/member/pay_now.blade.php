@extends('frontend.layouts.app')

@section('title', __('Add Account'))
@section('page_name', 'member-area-pay-now')

@push('after-styles')
    <link href="{{asset('assets/frontend/css/pay_now.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
      <div class="frame-wrapper">
          <div class="frame-group">
            <div class="frame-container">
              <div class="frame-div">
                <div class="arrow-left-wrapper">
                  <img
                    class="arrow-left-icon"
                    loading="lazy"
                    alt=""
                    src="{{ asset('assets/frontend/img/arrowleft.svg') }}"
                  />
                </div>
                <div class="pay-now-wrapper">
                  <div class="pay-now">Pay Now</div>
                </div>
              </div>
            </div>
            <div class="bank-info-label">
              <div class="rectangle-back"></div>
              <div class="bank-account">Bank Account</div>
              <div class="briva-paperid-parent">
                <div class="briva-paperid">briva paperid</div>
                <b class="b">3831 0223 4902</b>
                <div class="bank-bca-parent">
                  <div class="bank-bca">BANK BCA</div>
                  <div class="i-d-r-label">
                    <div class="idr-140000301">
                      <span class="idr">IDR</span>
                      <b class="b1"> 140.000.301</b>
                    </div>
                    <div class="please-note-that-the-amount-yo-wrapper">
                      <div class="please-note-that">
                        Please note that the amount you have to transfer might
                        be various, the last 3 digit-number is unique code to
                        make an easier approval.
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="f-a-q-help-center-maintenance">
                <div class="help-label-parent">
                  <div class="help-label" id="helpLabel"></div>
                  <div class="confirm-payment">Confirm Payment</div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection
@push('after-scripts')
@endpush
