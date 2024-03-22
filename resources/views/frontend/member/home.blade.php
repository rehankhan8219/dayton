@extends('frontend.layouts.app')

@section('title', __('Member Home'))
@section('page_name', 'member-area-member-area-logi')

@push('after-styles')
    <link href="{{asset('assets/frontend/css/member_home.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <section class="welcome-message">
        <div class="member-area-title">
          <div class="broker-account-list">
            <div class="welcome-aita-wrapper">
              <h2 class="welcome-aita">Welcome, Aita!</h2>
            </div>
            <div class="i-d-r-label">
              <div class="moneysend-instance">
                <div class="rectangle-back"></div>
                <div class="frame-group">
                  <div class="frame-container">
                    <div class="all-broker-account-wrapper">
                      <div class="all-broker-account">All Broker Account</div>
                    </div>
                    <div class="broker-account-list1" id="brokerAccountList">
                      Broker Account List
                    </div>
                  </div>
                  <div class="frame-wrapper">
                    <div class="frame-div">
                      <div class="payment-status-parent">
                        <div class="payment-status">Payment Status</div>
                        <img
                          class="info-circle-icon"
                          loading="lazy"
                          alt=""
                          src="{{ asset('assets/frontend/img/infocircle.svg') }}"
                        />
                      </div>
                      <button class="unpaid-wrapper">
                        <div class="unpaid">Unpaid</div>
                      </button>
                    </div>
                  </div>
                  <div class="bill-parent">
                    <div class="bill">Bill</div>
                    <div class="idr-140000000">
                      <span class="idr">IDR</span>
                      <b class="b"> 140.000.000</b>
                    </div>
                  </div>
                </div>
                <div class="moneysend-instance-inner">
                  <div class="frame-parent1">
                    <button class="money-send-parent">
                      <img
                        class="money-send-icon"
                        alt=""
                        src="{{ asset('assets/frontend/img/moneysend.svg') }}"
                      />

                      <div class="risk-level">
                        <div class="pay-now" id="payNowText">Pay Now</div>
                      </div>
                    </button>
                    <div class="frame-wrapper1">
                      <button class="ellipse-parent">
                        <div class="frame-inner"></div>
                        <div class="payment-history" id="paymentHistoryText">
                          Payment History
                        </div>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="due-date-to-avoid-the-deactiva-wrapper">
              <div class="due-date-to-container">
                <p class="due-date">
                  <b>Due Date</b>
                </p>
                <p class="to-avoid-the">
                  To Avoid the deactivation of your Expert Advisor, Please pay
                  the maintenance bill before the due date. The due date is
                  maximal 3 days after received the bill.
                </p>
              </div>
            </div>
          </div>
          <div class="profile-trendup-status-wrapper">
            <div class="profile-trendup-status">
              <div class="risk-calculator-wrapper">
                <div class="risk-calculator">Risk Calculator</div>
              </div>
              <div class="currency-u-s-d-label">
                <div class="pairs-parent">
                  <div class="pairs">Pairs</div>
                  <img
                    class="arrow-down-icon"
                    alt=""
                    src="{{ asset('assets/frontend/img/arrowdown.svg') }}"
                  />
                </div>
                <div class="risk-level-parent">
                  <div class="risk-level1">Risk Level</div>
                  <img
                    class="arrow-down-icon1"
                    alt=""
                    src="{{ asset('assets/frontend/img/arrowdown.svg') }}"
                  />
                </div>
                <div class="lot-parent">
                  <div class="lot">Lot</div>
                  <img
                    class="arrow-down-icon2"
                    alt=""
                    src="{{ asset('assets/frontend/img/arrowdown.svg') }}"
                  />
                </div>
              </div>
              <div class="profile-trendup-status-inner">
                <div class="frame-parent2">
                  <div class="recommended-balance-parent">
                    <div class="recommended-balance">Recommended Balance</div>
                    <div class="usd-1000-parent">
                      <div class="usd-1000">
                        <span class="usd">USD</span>
                        <b class="b1"> 1.000</b>
                      </div>
                      <div class="idr1">IDR</div>
                    </div>
                    <div class="traders-must-standby-container">
                      <p class="traders-must-standby">
                        Traders must standby 1x Top up balance for Low Risk, 2x
                        Top up balance for Medium Risk,
                      </p>
                      <p class="and-not-recommend">
                        and not recommend to Top up for High Risk level.
                      </p>
                    </div>
                  </div>
                  <div class="idr-parent">
                    <div class="idr2">IDR</div>
                    <b class="b2">140.800.000</b>
                  </div>
                </div>
              </div>
              <button class="generate-button">
                <div class="generate">Generate</div>
              </button>
            </div>
          </div>
          <div class="understand-the-risk-expert-adv-wrapper">
            <div class="understand-the-risk-container">
              <p class="understand-the-risk">
                <b>Understand the risk</b>
              </p>
              <p class="expert-advisors-eas">
                Expert Advisors (EAs) in trading can be risky. EAs are automated
                trading systems that execute trades based on pre-defined rules
                and algorithms. EAs may perform well in certain market
                conditions but can be risky in others. EA may struggle to adapt
                to changing market dynamics, leading to losses. EAs can offer
                benefits such as automation and efficiency, traders should
                approach them with caution and understand the risks involved.
              </p>
            </div>
          </div>
        </div>
      </section>
      <div class="idr-group">
        <div class="idr3">IDR</div>
        <b class="b3">140.800.000</b>
      </div>
      <div class="hometrendup-status-profile">
        <div class="profile">
          <img
            class="home-trend-up-icon"
            loading="lazy"
            alt=""
            src="{{ asset('assets/frontend/img/hometrendup.svg') }}"
          />

          <img
            class="status-up-icon"
            loading="lazy"
            alt=""
            src="{{ asset('assets/frontend/img/statusup.svg') }}"
            id="statusUpIcon"
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
