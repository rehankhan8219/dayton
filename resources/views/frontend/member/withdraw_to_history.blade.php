@extends('frontend.layouts.app')

@section('title', __('Withdraw To History'))
@section('page_name', 'dashboard-withdraw-history')

@push('after-styles')
    <link href="{{ asset('assets/frontend/css/withdraw_to_history.css') }}" rel="stylesheet" type="text/css" />  
@endpush

@section('content')
<section class="frame-parent">
       
        <div class="frame-wrapper">
          <div class="frame-container">
            <div class="frame-div">
              <div class="frame-wrapper1">
                <div class="frame-parent1">
                  <div class="arrow-left-wrapper" id="frameContainer">
                    <img
                      class="arrow-left-icon"
                      loading="lazy"
                      alt=""
                      src="{{ asset('assets/frontend/img/arrowleft.svg') }}"
                    />
                  </div>
                  <div class="withdraw-history-label">
                    <div class="withdraw-history">Withdraw History</div>
                  </div>
                </div>
              </div>
              <div class="frame-wrapper2">
                <div class="frame-parent2">
                  <div class="frame-parent3">
                    <div class="withdraw-button-parent">
                      <div class="withdraw-button">
                        <div class="withdraw">Withdraw</div>
                      </div>
                      <div class="paid">Paid</div>
                    </div>
                    <div class="amount-parent">
                      <div class="amount">Amount</div>
                      <div class="idr-4000000">
                        <span class="idr">IDR</span>
                        <b class="b"> 4.000.000</b>
                      </div>
                    </div>
                  </div>
                  <div class="help-button">
                    <div class="mar-2023-wrapper">
                      <div class="mar-2023">10 Mar 2023</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="frame-parent4">
              <div class="frame-parent5">
                <div class="frame-parent6">
                  <div class="frame-parent7">
                    <div class="withdraw-wrapper">
                      <div class="withdraw1">Withdraw</div>
                    </div>
                    <div class="processing">Processing</div>
                  </div>
                  <div class="amount-group">
                    <div class="amount1">Amount</div>
                    <div class="idr-40000001">
                      <span class="idr1">IDR</span>
                      <b class="b1"> 4.000.000</b>
                    </div>
                  </div>
                </div>
                <div class="frame-wrapper3">
                  <div class="mar-2023-container">
                    <div class="mar-20231">10 Mar 2023</div>
                  </div>
                </div>
              </div>
              <div class="frame-wrapper4">
                <div class="frame-parent8">
                  <div class="frame-parent9">
                    <div class="frame-parent10">
                      <div class="withdraw-container">
                        <div class="withdraw2">Withdraw</div>
                      </div>
                      <div class="failed">Failed</div>
                    </div>
                    <div class="amount-container">
                      <div class="amount2">Amount</div>
                      <div class="idr-40000002">
                        <span class="idr2">IDR</span>
                        <b class="b2"> 4.000.000</b>
                      </div>
                    </div>
                  </div>
                  <div class="frame-wrapper5">
                    <div class="mar-2023-frame">
                      <div class="mar-20232">10 Mar 2023</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection
@push('after-scripts')
@endpush
