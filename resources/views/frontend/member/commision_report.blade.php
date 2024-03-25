@extends('frontend.layouts.app')

@section('title', __('Commision Report'))
@section('page_name', 'dashboard-commission-report')

@push('after-styles')
    <link href="{{ asset('assets/frontend/css/dashboard-commission-report.css') }}" rel="stylesheet" type="text/css" />  
@endpush

@section('content')
<section class="dashboard-commission-report-inner">
        <div class="frame-group">
          <div class="frame-wrapper">
            <div class="frame-container">
              <div class="arrow-left-wrapper" id="frameContainer">
                <img
                  class="arrow-left-icon"
                  loading="lazy"
                  alt=""
                  src="{{ asset('assets/frontend/img/arrowleft.svg') }}"
                />
              </div>
              <div class="commission-report-label">
                <div class="comission-report">Comission Report</div>
              </div>
            </div>
          </div>
          <div class="commission-layer">
            <div class="frame-div">
              <div class="frame-parent1">
                <div class="frame-wrapper1">
                  <div class="commission-layer-1-wrapper">
                    <div class="commission-layer-1">Commission Layer 1</div>
                  </div>
                </div>
                <div class="icon-circle-instance">
                  <div class="commission-period-parent">
                    <div class="commission-period">Commission Period</div>
                    <img
                      class="info-circle-icon"
                      loading="lazy"
                      alt=""
                      src="{{ asset('assets/frontend/img/infocircle.svg') }}"
                    />
                  </div>
                  <button class="jan-2023-22-jan-2023-wrapper">
                    <div class="jan-2023-">01 Jan 2023 - 22 Jan 2023</div>
                  </button>
                </div>
                <div class="amount-label">
                  <div class="amount">Amount</div>
                  <div class="idr-4000000">
                    <span class="idr">IDR</span>
                    <b class="b"> 4.000.000</b>
                  </div>
                </div>
              </div>
              <div class="frame-wrapper2">
                <div class="frame-inner"></div>
              </div>
            </div>
          </div>
          <div class="commission-layer1">
            <div class="frame-parent2">
              <div class="frame-parent3">
                <div class="frame-wrapper3">
                  <div class="commission-layer-2-wrapper">
                    <div class="commission-layer-2">Commission Layer 2</div>
                  </div>
                </div>
                <div class="frame-parent4">
                  <div class="commission-period-group">
                    <div class="commission-period1">Commission Period</div>
                    <img
                      class="info-circle-icon1"
                      alt=""
                      src="{{ asset('assets/frontend/img/infocircle.svg') }}"
                    />
                  </div>
                  <button class="jan-2023-22-jan-2023-container">
                    <div class="jan-2023-1">01 Jan 2023 - 22 Jan 2023</div>
                  </button>
                </div>
                <div class="amount-parent">
                  <div class="amount1">Amount</div>
                  <div class="idr-40000001">
                    <span class="idr1">IDR</span>
                    <b class="b1"> 4.000.000</b>
                  </div>
                </div>
              </div>
              <div class="frame-wrapper4">
                <div class="frame-child1"></div>
              </div>
            </div>
          </div>
          <div class="commission-layer2">
            <div class="frame-parent5">
              <div class="frame-parent6">
                <div class="frame-wrapper5">
                  <div class="commission-layer-3-wrapper">
                    <div class="commission-layer-3">Commission Layer 3</div>
                  </div>
                </div>
                <div class="frame-parent7">
                  <div class="commission-period-container">
                    <div class="commission-period2">Commission Period</div>
                    <img
                      class="info-circle-icon2"
                      alt=""
                      src="{{ asset('assets/frontend/img/infocircle.svg') }}"
                    />
                  </div>
                  <button class="jan-2023-22-jan-2023-frame">
                    <div class="jan-2023-2">01 Jan 2023 - 22 Jan 2023</div>
                  </button>
                </div>
                <div class="amount-group">
                  <div class="amount2">Amount</div>
                  <div class="idr-40000002">
                    <span class="idr2">IDR</span>
                    <b class="b2"> 4.000.000</b>
                  </div>
                </div>
              </div>
              <div class="frame-wrapper6">
                <div class="frame-child2"></div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection
@push('after-scripts')
@endpush
