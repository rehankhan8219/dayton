@extends('frontend.layouts.app')

@section('title', __('Home'))
@section('page_name', 'home')

@push('after-styles')
    <link href="{{asset('assets/frontend/css/home.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('content')

<section class="home-page-main-overlay"></section>

<section class="home-child min_height_for_footer">
  <div class="frame-group">
    <div class="frame-wrapper">
      <div class="row">
        <div class="col-sm-9">
          <div class="frame-container">
            <div class="join-our-community-and-get-yo-parent">
              <h1 class="join-our-community-container">
                <p class="join-our-community"> {!! nl2br($home_secton_1->subtitle) !!}</p>
              </h1>
              <div class="be-a-part-container">
                <p class="be-a-part">
                  {!! nl2br($home_secton_1->script) !!}
                </p>
              </div>
            </div>
            <button class="rectangle-group">
              <div class="rectangle-div"></div>
              <b class="member-area1">Member Area</b>
            </button>
          </div>
        </div>
        <div class="col-sm-3">
          <section class="home-inner">
            <div class="ellipse-parent">
              <div class="frame-inner"></div>
              <div class="ellipse-div"></div>
              <img class="shopping-cart-icon" alt="" src="{{ asset('assets/frontend/img/other-01-11@2x.png') }}" />

              <img class="man-figure" loading="lazy" alt="" src="{{ asset('assets/frontend/img/badrun-4.png') }}" />
            </div>
          </section>
        </div>
      </div>
    </div>
    <div class="bottom-controls-container">
      <div class="home-second-section row w-100">
        <div class="col-sm-8">
          <div class="youtube-player">
          <iframe width="100%" height="313" src="{{ $home_secton_2->video }}"></iframe>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="bottom-controls-container-inner">
            <div class="learn-how-to-start-in-dayton-f-parent">
              <h2 class="learn-how-to-container">
                <p class="learn-how-to">{!! nl2br($home_secton_2->subtitle) !!}</p>
              </h2>
              <div class="frame-parent1">
                <div class="forex-broker-parent">
                  {!! $home_secton_2->script !!}
                </div>
              </div>
              <button class="rectangle-container">
                <div class="frame-child1"></div>
                <div class="learn-more">Learn More</div>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
@push('after-scripts')
    <script>
    </script>
@endpush
