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
              <iframe width="100%" height="313" src="{{ $about_us_secton_1->video }}"></iframe>
           </div>
        </div>
        <div class="col-sm-6 col-md-6">
           <div class="frame-wrapper">
              <div class="frame-parent3">
                 <div class="what-is-dayton-fintech-parent">
                    <h2 class="what-is-dayton">{!! $about_us_secton_1->subtitle !!}</h2>
                    <div class="dayton-fintech-is-container">
                       <p class="dayton-fintech-is">
                          {!! $about_us_secton_1->script !!}
                       </p>
                    </div>
                 </div>
                 <a href="{{ route('frontend.member.help-center') }}" class="rectangle-group">
                    <div class="rectangle-div"></div>
                    <div class="learn-more">Learn More</div>
                 </a>
              </div>
           </div>
        </div>
     </div>
     <div class="frame-parent4">
        <div class="dayton-fintech-monthly-report-parent">
           <h2 class="dayton-fintech-monthly">
              {!! $about_us_secton_2->subtitle !!}
           </h2>
           <div class="dayton-fintech-is-container1">
              <p class="dayton-fintech-is1">
                {!! $about_us_secton_2->script !!}
              </p>
           </div>
        </div>
        <a href="{{ route('frontend.member.help-center') }}" class="rectangle-container">
           <div class="frame-child1"></div>
           <div class="learn-more1">Learn More</div>
        </a>
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
