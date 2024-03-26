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
      @foreach($commision_reports as $report)
      <div class="commission-layer">
         <div class="frame-div">
            <div class="frame-parent1">
               <div class="frame-wrapper1">
                  <div class="commission-layer-1-wrapper">
                     <div class="commission-layer-1">Commission {{ $report->level }}</div>
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
                  <button class="commison-date-wrapper">
                     <div class="commision-date-format">
                        {{ \Carbon\Carbon::createFromFormat('Y-m-d', $report->start_date)->format('d M Y') }}
                        - 
                        {{ \Carbon\Carbon::createFromFormat('Y-m-d', $report->end_date)->format('d M Y') }}
                     </div>
                  </button>
               </div>
               <div class="amount-label">
                  <div class="amount">Amount</div>
                  <div class="idr-4000000">
                     <span class="idr">IDR</span>
                     <b class="b"> {{ $report->amount }}</b>
                  </div>
               </div>
            </div>
            <div class="frame-wrapper2">
               <div class="frame-inner"></div>
            </div>
         </div>
      </div>
      @endforeach
   </div>
</section>
@endsection
@push('after-scripts')
@endpush