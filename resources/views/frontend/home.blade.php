@extends('frontend.layouts.app')

@section('title', __('Home'))
@section('page_name', 'home')

@push('after-styles')
    <link href="{{asset('assets/frontend/css/home.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('content')

<section class="home-page-main-overlay"></section>

<section class="home-child">
  <div class="frame-group">
    <div class="frame-wrapper">
      <div class="row">
        <div class="col-sm-9">
          <div class="frame-container">
            <div class="join-our-community-and-get-yo-parent">
              <h1 class="join-our-community-container">
                <p class="join-our-community">Join our Community!</p>
                <p class="and-get-your">And Get your Auto-Trade</p>
                <p class="expert-advisor">Expert Advisor!</p>
              </h1>
              <div class="be-a-part-container">
                <p class="be-a-part">
                  Be a part of Dayton Fintech and take advantage of ongoing
                  events
                </p>
                <p class="by-clicking-the">
                  by clicking the button below to register.
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
          <iframe width="100%" height="313" src="https://www.youtube.com/embed/tgbNymZ7vqY?autoplay=0&mute=0"></iframe>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="bottom-controls-container-inner">
            <div class="learn-how-to-start-in-dayton-f-parent">
              <h2 class="learn-how-to-container">
                <p class="learn-how-to">Learn how to start in</p>
                <p class="dayton-fintech-easier">Dayton Fintech easier</p>
              </h2>
              <div class="frame-parent1">
                <div class="forex-broker-parent">
                  <div class="forex-broker">Forex Broker</div>
                  <div class="tricks-and-tips">
                    Tricks and tips to choose your broker
                  </div>
                </div>
                <div class="meta-trader-info">
                  <div class="meta-trader-4">Meta Trader 4</div>
                  <div class="instant-trade-with">
                    Instant trade with Meta Trader 4
                  </div>
                </div>
                <div class="dayton-expert-advisor-parent">
                  <div class="dayton-expert-advisor">
                    Dayton Expert Advisor
                  </div>
                  <div class="choose-your-pairs">
                    Choose your pairs and start to auto - trade with Dayton
                  </div>
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
