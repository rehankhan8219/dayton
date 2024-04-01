@extends('frontend.layouts.app')

@section('title', __('Grow Team'))
@section('page_name', 'dashboard-grow-team-page')

@push('after-styles')
    <link href="{{ asset('assets/frontend/css/grow_team.css') }}" rel="stylesheet" type="text/css" />  
    <style type="text/css">
      .copy-icon{
        cursor: pointer;
      }

      .copy-message {
        font-weight: bold;
        display: none;
        float: right;
      }

      .home-trend-up-parent-container {
          position: relative;
      }

      .home-trend-up-parent {
          position: fixed;
          bottom: 180px;
          left: 50%;
          transform: translateX(-50%);
          z-index: 1000;
      }

    </style>
@endpush

@section('content')
  <main class="frame-parent">
       
        <section class="frame-wrapper">
          <div class="frame-container">
            <div class="frame-div">
              <div class="your-level-parent">
                <div class="your-level">Your Level</div>
                @if(!empty($grow_tree_details))
                  <h1 class="bronze">{{ $grow_tree_details->level->name }}</h1>
                @else
                  <span class="">No Information Found</span>
                @endif
                
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
                            <span class="span">{{formatAmount(getTotalCommission($logged_in_user->id))}}</span>
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
                            <span class="span1">{{formatAmount(getAvailableCommission($logged_in_user->id))}}</span>
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
                <!-- <div class="copy-instance">
                  <a href="{{ route('frontend.member.commision-report') }}" class="card-send-parent" id="frameButton">

                    <img
                      class="status-up-icon"
                      alt=""
                      src="{{ asset('assets/frontend/img/statusup.svg') }}"
                    />

                    <div class="commission-report-wrapper">
                      <b class="commission-report">Commission Report</b>
                    </div>
                  </a>
                </div> -->

                <div class="copy-instance1 w-100">
                  <a href="{{ route('frontend.member.commision-report') }}" class="card-send-group" id="frameButton1">
                    <img
                      class="status-up-icon"
                      alt=""
                      src="{{ asset('assets/frontend/img/statusup.svg') }}"
                    />

                    <div class="withdraw-now-wrapper">
                      <b class="withdraw-now">Commission Report</b>
                    </div>
                  </a>
                </div>

                <div class="copy-instance1">
                  <a href="{{ route('frontend.withdrawal.create') }}" class="card-send-group" id="frameButton1">
                    <img
                      class="card-send-icon1"
                      alt=""
                      src="{{ asset('assets/frontend/img/cardsend-1.svg') }}"
                    />

                    <div class="withdraw-now-wrapper">
                      <b class="withdraw-now">Withdraw Now</b>
                    </div>
                  </a>
                </div>
                <a href="{{ route('frontend.withdrawal.index') }}" class="ellipse-parent" id="frameButton2">
                  <div class="ellipse-div"></div>
                  <b class="withdraw-history">Withdraw History</b>
                </a>
              </div>
            </div>
            <div class="unit-parent">
              <div class="unit">Referral Code</div>
              <div class="rectangle-group">
                <div class="rectangle-div"></div>
                <div class="dt102">{{ auth()->user()->dt_code }}</div>
                
                <div class="copy-wrapper">
                  <img class="copy-icon" alt="Copy" src="{{ asset('assets/frontend/img/copy.svg') }}" onclick="copyReferralCode()" />
                </div>
              </div>
              <span class="copy-message">copied!</span>
            </div>
            @if(!empty($grow_tree_details) && !empty($grow_tree_details->diagram))
            <div class="field">
              <div class="growth-tree">Growth Tree</div>
              <a href="{{ Storage::url($grow_tree_details->diagram) }}" download="{{ $grow_tree_details->diagram }}" class="field-inner">
                <div class="download-growth-tree-diagram-wrapper">
                  <b class="download-growth-tree"
                    >Download Growth Tree Diagram</b
                  >
                </div>
              </a>
            </div>
            @endif
          </div>
        </section>
      </main>
      <div class="dashboard-grow-team-page-inner home-trend-up-parent-container">
        <div class="home-trend-up-parent">
          <a href="{{ route('frontend.member.home')  }}">
          <img
            class="home-trend-up-icon"
            loading="lazy"
            alt=""
            src="{{ asset('assets/frontend/img/hometrendup.svg') }}"
            id="homeTrendUpIcon"
          />
          </a>

          <a href="{{ route('frontend.member.grow-team-page')  }}">
          <img
            class="status-up-icon1"
            loading="lazy"
            alt=""
            src="{{ asset('assets/frontend/img/statusup-1.svg') }}"
          />
          </a>

          <a href="{{ route('frontend.member.profile.index')  }}">
          <img
            class="profile-icon"
            loading="lazy"
            alt=""
            src="{{ asset('assets/frontend/img/profile.svg') }}"
            id="profileIcon"
          />
        </a>
        </div>
      </div>

@endsection
@push('after-scripts')
<script>
   function copyReferralCode() {
        var referralCode = document.querySelector('.dt102');
        var copyMessage = document.querySelector('.copy-message');

        // Create a temporary textarea element
        var textarea = document.createElement('textarea');
        textarea.value = referralCode.textContent;
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand('copy');
        document.body.removeChild(textarea);

        // Show the copy message
        copyMessage.style.display = 'inline';

        // Hide the copy message after 2 seconds
        setTimeout(function() {
            copyMessage.style.display = 'none';
        }, 2000);
    }
</script>
@endpush
