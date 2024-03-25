@extends('frontend.layouts.app')

@section('title', __('Help Center'))
@section('page_name', 'help-center')

@push('after-styles')
    <link href="{{ asset('assets/frontend/css/help_center.css') }}" rel="stylesheet" type="text/css" />  
    <style type="text/css">
      .add_account_selectbox {
          height: 45px;
          width: 100%;
          position: absolute;
          margin: 0 !important;
          top: 0;
          right: 0;
          bottom: 0;
          left: 0;
          border-radius: var(--br-3xs);
          padding-left: 50px;
          color: var(--bw-dark-gray);
          font-size: var(--medium-medium-14-size);
          font-weight: 500;
          font-family: var(--medium-medium-14);
          border-radius: 10px;
          border-color: gray;
      }

      .custom-caret {
        position: absolute;
        top: 38px;
        right: 37px;
        transform: translateY(-50%);
        pointer-events: none; 
    }

    .custom-before-icon{
      position: absolute;
      top: 20px;
      transform: translateY(-50%);
      pointer-events: none; 
      z-index: 99999;
    }

    .help_center_selectbox{
      height: 45px !important;
    }
    </style>
@endpush

@section('content')
<section class="previous-help-center-wrapper">
        <div class="previous-help-center">
          <div class="frame-group">
            <div class="arrow-left-wrapper" id="frameContainer">
              <img
                class="arrow-left-icon"
                loading="lazy"
                alt=""
                src="{{ asset('assets/frontend/img/arrowleft.svg') }}"
              />
            </div>
            <div class="frequently-asked-questions">
              <div class="help-center1">Help Center</div>
            </div>
          </div>
          <div class="leverage-commission-withdraw">
            <div class="phone-symbol">
              <img
                class="phonesphone-call-icon"
                alt=""
                src="{{ asset('assets/frontend/img/support-help-questionheadphones-customer-support.svg') }}"
              />

              <h3 class="help-center2">Help Center</h3>
            </div>

            <div class="w-100">
              <div class="row help_center_selectbox">
                <div class="col-md-9">
                    <div class="custom-before-icon">
                          <img class="arrow-down-icon" alt=""
                              src="{{ asset('assets/frontend/img/vector-1.svg') }}">
                    </div>   
                    {{ html()->select('risk_level', [
                            'Indonesia' => 'Indonesia',
                            'Malesiya' => 'Malesiya',
                            'Singapore' => 'Singapore',
                            'Vietnam' => 'Vietnam',
                            'Phillipine' => 'Phillipine',
                            'Thailand' => 'Thailand',
                        ])
                            ->class('form-control add_account_selectbox')
                            ->placeholder(__('Leverage'))
                            ->required() }}
                      <div class="custom-caret">
                              <div class="group">
                                <div class="div4">&gt;</div>
                                <div class="div5">&gt;</div>
                              </div>
                      </div>
                </div>
              </div>

              <div class="row help_center_selectbox">
                <div class="col-md-9">
                    <div class="custom-before-icon">
                          <img class="arrow-down-icon" alt=""
                              src="{{ asset('assets/frontend/img/vector-1.svg') }}">
                    </div>   
                    {{ html()->select('commision', [
                            'Indonesia' => 'Indonesia',
                            'Malesiya' => 'Malesiya',
                            'Singapore' => 'Singapore',
                            'Vietnam' => 'Vietnam',
                            'Phillipine' => 'Phillipine',
                            'Thailand' => 'Thailand',
                        ])
                            ->class('form-control add_account_selectbox')
                            ->placeholder(__('Commision'))
                            ->required() }}
                      <div class="custom-caret">
                              <div class="group">
                                <div class="div4">&gt;</div>
                                <div class="div5">&gt;</div>
                              </div>
                      </div>
                </div>
              </div>

               <div class="row help_center_selectbox">
                <div class="col-md-9">
                    <div class="custom-before-icon">
                          <img class="arrow-down-icon" alt=""
                              src="{{ asset('assets/frontend/img/vector-1.svg') }}">
                    </div>   
                    {{ html()->select('risk_level', [
                            'Indonesia' => 'Indonesia',
                            'Malesiya' => 'Malesiya',
                            'Singapore' => 'Singapore',
                            'Vietnam' => 'Vietnam',
                            'Phillipine' => 'Phillipine',
                            'Thailand' => 'Thailand',
                        ])
                            ->class('form-control add_account_selectbox')
                            ->placeholder(__('Withdraw'))
                            ->required() }}
                      <div class="custom-caret">
                              <div class="group">
                                <div class="div4">&gt;</div>
                                <div class="div5">&gt;</div>
                              </div>
                      </div>
                </div>
              </div>

            </div>

            <!-- <div class="leverage-commission-wrapper">
              <div class="leverage-commission">
                <div class="leverage-withdraw">
                  <div class="leverage-withdraw-inner">
                    <div class="frame-container">
                      <div class="leverage-wrapper">
                        <img
                          class="leverage-icon"
                          loading="lazy"
                          alt=""
                          src="{{ asset('assets/frontend/img/vector-1.svg') }}"
                        />
                      </div>
                      <b class="leverage">Leverage</b>
                    </div>
                  </div>
                  <div class="leverage-withdraw-child"></div>
                  <div class="withdraw-button">
                    <div class="div">&gt;</div>
                    <div class="div1">&gt;</div>
                  </div>
                </div>

                <div class="leverage-withdraw1">
                  <div class="frame-div">
                    <div class="frame-parent1">
                      <div class="vector-wrapper">
                        <img
                          class="frame-inner"
                          loading="lazy"
                          alt=""
                          src="{{ asset('assets/frontend/img/vector-1.svg') }}"
                        />
                      </div>
                      <b class="commission">Commission</b>
                    </div>
                  </div>
                  <div class="leverage-withdraw-item"></div>
                  <div class="parent">
                    <div class="div2">&gt;</div>
                    <div class="div3">&gt;</div>
                  </div>
                </div>
                <div class="leverage-withdraw2">
                  <div class="leverage-withdraw-inner1">
                    <div class="frame-parent2">
                      <div class="vector-container">
                        <img
                          class="vector-icon"
                          loading="lazy"
                          alt=""
                          src="{{ asset('assets/frontend/img/vector-1.svg') }}"
                        />
                      </div>
                      <b class="withdraw">Withdraw</b>
                    </div>
                  </div>
                  <div class="rectangle-div"></div>
                  <div class="group">
                    <div class="div4">&gt;</div>
                    <div class="div5">&gt;</div>
                  </div>
                </div>
              </div>
            </div> -->
            <div class="question-about-withdraw-how-t-wrapper mt-5">
              <div class="question-about-withdraw-container">
                <ol class="question-about-withdraw-how-t">
                  <li class="question-about-withdraw">
                    Question about withdraw?
                  </li>
                  <li>How to withdraw?</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </section>
      <div class="help-center-child"></div>
      <!-- <img class="group-icon1" alt="" src="{{ asset('assets/frontend/img/group-1.svg') }}" /> -->

      <section class="help-center-inner">
        <div class="support-help-questionheadph-parent">
          <img
            class="support-help-questionheadph"
            loading="lazy"
            alt=""
            src="{{ asset('assets/frontend/img/support-help-questionheadphones-customer-support.svg') }}"
          />

          <div class="live-chat-telegram-instance">
            <div class="live-chat">Live Chat :</div>
          </div>
          <div class="live-chat-telegram-instance1">
            <div class="telegram-daytonfintech">Telegram @daytonfintech</div>
          </div>
        </div>
      </section>
@endsection
@push('after-scripts')
@endpush
