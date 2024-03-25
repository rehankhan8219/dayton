@extends('frontend.layouts.app')

@section('title', __('Grow Team'))
@section('page_name', 'dashboard-grow-team-page')

@push('after-styles')
    <link href="{{ asset('assets/frontend/css/grow_team.css') }}" rel="stylesheet" type="text/css" />  
@endpush

@section('content')
  <main class="frame-parent">
       
        <section class="frame-wrapper">
          <div class="frame-container">
            <div class="frame-div">
              <div class="your-level-parent">
                <div class="your-level">Your Level</div>
                <h1 class="bronze">BRONZE</h1>
                <div class="frame-inner"></div>
              </div>
              <div class="frame-wrapper1">
                <div class="commission-and-unpaid-commissi-parent">
                  <div class="commission-and-unpaid-commissi">
                    <div class="commission-and-unpaid-commissi-inner">
                      <div class="total-commision-parent">
                        <div class="total-commision">Total Commision</div>
                        <b class="idr-100000000">
                          <span>
                            <span class="idr">IDR </span>
                            <span class="span">100.000.000</span>
                          </span>
                        </b>
                      </div>
                    </div>
                  </div>
                  <div class="commission-and-unpaid-commissi1">
                    <div class="commission-and-unpaid-commissi-child">
                      <div class="unpaid-commision-parent">
                        <div class="unpaid-commision">Unpaid Commision</div>
                        <b class="idr-60000000">
                          <span>
                            <span class="idr1">IDR </span>
                            <span class="span1">60.000.000</span>
                          </span>
                        </b>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="frame-wrapper2">
              <div class="copy-instance-parent">
                <div class="copy-instance">
                  <button class="card-send-parent" id="frameButton">

                    <img
                      class="status-up-icon"
                      alt=""
                      src="{{ asset('assets/frontend/img/statusup.svg') }}"
                    />

                    <div class="commission-report-wrapper">
                      <b class="commission-report">Commission Report</b>
                    </div>
                  </button>
                </div>
                <div class="copy-instance1">
                  <button class="card-send-group" id="frameButton1">
                    <img
                      class="card-send-icon1"
                      alt=""
                      src="{{ asset('assets/frontend/img/cardsend-1.svg') }}"
                    />

                    <div class="withdraw-now-wrapper">
                      <b class="withdraw-now">Withdraw Now</b>
                    </div>
                  </button>
                </div>
                <button class="ellipse-parent" id="frameButton2">
                  <div class="ellipse-div"></div>
                  <b class="withdraw-history">Withdraw History</b>
                </button>
              </div>
            </div>
            <div class="unit-parent">
              <div class="unit">Referral Code</div>
              <div class="rectangle-group">
                <div class="rectangle-div"></div>
                <div class="dt102">DT102</div>
                <div class="copy-wrapper">
                  <img class="copy-icon" alt="" src="{{ asset('assets/frontend/img/copy.svg') }}" />
                </div>
              </div>
            </div>
            <div class="field">
              <div class="growth-tree">Growth Tree</div>
              <button class="field-inner">
                <div class="download-growth-tree-diagram-wrapper">
                  <b class="download-growth-tree"
                    >Download Growth Tree Diagram</b
                  >
                </div>
              </button>
            </div>
          </div>
        </section>
      </main>
      <div class="dashboard-grow-team-page-inner">
        <div class="home-trend-up-parent">
          <img
            class="home-trend-up-icon"
            loading="lazy"
            alt=""
            src="{{ asset('assets/frontend/img/hometrendup.svg') }}"
            id="homeTrendUpIcon"
          />

          <img
            class="status-up-icon1"
            loading="lazy"
            alt=""
            src="{{ asset('assets/frontend/img/statusup-1.svg') }}"
          />

          <img
            class="profile-icon"
            loading="lazy"
            alt=""
            src="{{ asset('assets/frontend/img/profile.svg') }}"
            id="profileIcon"
          />
        </div>
      </div>

@endsection
@push('after-scripts')
@endpush
