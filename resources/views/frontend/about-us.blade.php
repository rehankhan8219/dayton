@extends('frontend.layouts.app')

@section('title', __('About Us'))
@section('page_name', 'about-us')

@push('after-styles')
    <link href="{{asset('assets/frontend/css/about-us.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('content')

<div class="frame-parent">
  <div class="ellipse-parent">
     <div class="frame-child"></div>
     <div class="frame-item"></div>
  </div>
</div>
<section class="about-us-inner">
  <div class="frame-container">
     <div class="row">
        <div class="col-sm-6 col-md-6">
           <div class="youtube-player">
              <iframe width="100%" height="313" src="https://www.youtube.com/embed/tgbNymZ7vqY?autoplay=0&mute=0"></iframe>
           </div>
        </div>
        <div class="col-sm-6 col-md-6">
           <div class="frame-wrapper">
              <div class="frame-parent3">
                 <div class="what-is-dayton-fintech-parent">
                    <h2 class="what-is-dayton">What is Dayton Fintech?</h2>
                    <div class="dayton-fintech-is-container">
                       <p class="dayton-fintech-is">
                          Dayton Fintech is a piece of Expert Advisor software
                          written specifically for the MetaTrader platform, which is
                          widely used for trading Forex, stocks, and other financial
                          instruments. Expert Advisors are essentially automated
                          trading systems that can execute trades on behalf of
                          traders based on pre-defined rules or algorithms.
                       </p>
                    </div>
                 </div>
                 <button class="rectangle-group">
                    <div class="rectangle-div"></div>
                    <div class="learn-more">Learn More</div>
                 </button>
              </div>
           </div>
        </div>
     </div>
     <div class="frame-parent4">
        <div class="dayton-fintech-monthly-report-parent">
           <h2 class="dayton-fintech-monthly">
              Dayton Fintech Monthly Report
           </h2>
           <div class="dayton-fintech-is-container1">
              <p class="dayton-fintech-is1">
                 Dayton Fintech is a piece of Expert Advisor software written
                 specifically for the MetaTrader platform, which is widely used
                 for trading Forex, stocks, and other financial instruments.
                 Expert Advisors are essentially automated trading systems that
                 can execute trades on behalf of traders based on pre-defined
                 rules or algorithms.
              </p>
           </div>
        </div>
        <button class="rectangle-container">
           <div class="frame-child1"></div>
           <div class="learn-more1">Learn More</div>
        </button>
     </div>
  </div>
</section>
<section class="frame-footer-section">
  <div class="frame-footer">
     <div class="dayton-fintech-logo-parent">
        <div class="dayton-fintech-logo"></div>
        <img class="other-01-18" alt="" src="{{ asset('assets/frontend/img/other-01-18@2x.png') }}" />
        <div class="marni-2-parent">
           <img class="marni-2-icon" alt="" src="{{ asset('assets/frontend/img/marni-2.png') }}" />
           <img class="untitled-icon" loading="lazy" alt="" src="{{ asset('assets/frontend/img/untitled@2x.png') }}" />
           <img class="untitled2-icon" loading="lazy" alt="" src="{{ asset('assets/frontend/img/untitled2@2x.png') }}" />
           <img class="other-01-3" loading="lazy" alt="" src="{{ asset('assets/frontend/img/other-01-3@2x.png') }}" />
        </div>
     </div>
  </div>
</section>

@endsection
@push('after-scripts')
    <script>
    </script>
@endpush
