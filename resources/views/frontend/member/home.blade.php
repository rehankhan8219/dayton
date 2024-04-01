@extends('frontend.layouts.app')

@section('title', __('Member Home'))
@section('page_name', 'member-area-member-area-logi')

@push('after-styles')
    <link href="{{ asset('assets/frontend/css/member_home.css') }}" rel="stylesheet" type="text/css" />
    <style>

       .home-selectbox {
             appearance: none; /* Remove default arrow */
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url('assets/frontend/img/arrowdown.svg'); 
            background-repeat: no-repeat;
            background-position: right center; 
            padding-right: 30px; 
            border-radius: 50px;
            border-color: grey;
            background-size: 16px;
            background-position: calc(100% - 10px) center;
        }

        .hometrendup-status-profile-container {
            position: relative;
        }

        .hometrendup-status-profile {
            position: fixed;
            bottom: 25px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1000;
        }

    </style>    
@endpush

@section('content')
    <section class="welcome-message">
        <div class="member-area-title">
            <div class="broker-account-list">
                <div class="welcome-aita-wrapper">
                    <h2 class="welcome-aita">Welcome, {{$logged_in_user->name}}!</h2>
                </div>
                <div class="i-d-r-label">
                    <div class="moneysend-instance">
                        <div class="rectangle-back"></div>
                        <div class="frame-group">
                            <div class="frame-container">
                                <div class="all-broker-account-wrapper">
                                    <div class="all-broker-account">All Broker Account</div>
                                </div>
                                <a class="broker-account-list1" id="brokerAccountList" href="{{route('frontend.broker.index')}}">
                                    Broker Account List
                                </a>
                            </div>
                            <div class="frame-wrapper">
                                <div class="frame-div">
                                    <div class="payment-status-parent">
                                        <div class="payment-status">Payment Status</div>
                                        <img class="info-circle-icon" loading="lazy" alt=""
                                            src="{{ asset('assets/frontend/img/infocircle.svg') }}" />
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
                                    <b class="b">{{formatAmount($amount)}}</b>
                                </div>
                            </div>
                        </div>
                        <div class="moneysend-instance-inner">
                            <div class="frame-parent1">
                                @if ($amount !== 0)
                                    <a class="money-send-parent" href="{{route('frontend.bill.index')}}">
                                        <img class="money-send-icon" alt=""
                                            src="{{ asset('assets/frontend/img/moneysend.svg') }}" />

                                        <div class="risk-level">
                                            <div class="pay-now" id="payNowText">Pay Now</div>
                                        </div>
                                    </a>
                                @endif
                                <a class="frame-wrapper1" href="{{route('frontend.bill.history')}}">
                                    <button class="ellipse-parent">
                                        <div class="frame-inner"></div>
                                        <div class="payment-history" id="paymentHistoryText">
                                            Payment History
                                        </div>
                                    </button>
                                </a>
                                @if ($bill && $amount !== 0)
                                    <div class="frame-wrapper1 dropdown">
                                        <button class="ellipse-parent dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <div class="frame-inner"></div>
                                            <div class="payment-history" id="paymentHistoryText">
                                                Details
                                            </div>
                                        </button>
                                        <ul class="dropdown-menu">
                                            @foreach (explode(PHP_EOL, $bill->details) as $item)
                                                <li><a class="dropdown-item" href="javascript:void(0)">{{$item}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="calculation_section">
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
                
                <div class="profile-trendup-status-wrapper mt-4">
                    <div class="profile-trendup-status">
                        <div class="risk-calculator-wrapper">
                            <div class="risk-calculator">Risk Calculator</div>
                        </div>
                        <div class="currency-u-s-d-label rectangle-container">
                            <div class="pairs-parent1">
                                <select id="pairs" class="form-control home-selectbox">
                                    <option value="">Pairs</option>
                                    @foreach(getUniquePairs() as $pair_id => $pair)
                                    <option value="{{ $pair }}">{{ $pair }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="risk-level-parent1">
                                    <select id="risk_level" class="form-control home-selectbox">
                                        <option value="">Risk Level</option>
                                        @foreach(getUniqueRiskLevel() as $risk_level_id => $risk_level)
                                        <option value="{{ $risk_level }}">{{ $risk_level }}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="lot-parent1">
                                <select id="lot" class="form-control home-selectbox">
                                    <option value="">Lot</option>
                                    @foreach(getUniqueLot() as $lot_id => $lot)
                                    <option value="{{ $lot }}">{{ $lot }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="profile-trendup-status-inner d-none info-section">
                            <div class="frame-parent2">
                                <div class="recommended-balance-parent">
                                    <div class="recommended-balance">Recommended Balance</div>
                                    <div class="usd-1000-parent">
                                        <div class="usd-1000">
                                            <span class="usd">USD</span>
                                            <b class="b1 risk_calculate_balance"> 1.000</b>
                                        </div>
                                        <div class="idr1">IDR</div>
                                    </div>
                                    <div class="traders-must-standby-container">
                                        <p class="traders-must-standby risk_calculate_explanation">
                                            Traders must standby 1x Top up balance for Low Risk, 2x
                                            Top up balance for Medium Risk,
                                        </p>
                                        <!-- <p class="and-not-recommend">
                                            and not recommend to Top up for High Risk level.
                                        </p> -->
                                    </div>
                                </div>
                                <!-- <div class="idr-parent">
                                    <div class="idr2">IDR</div>
                                    <b class="b2">140.800.000</b>
                                </div> -->
                            </div>
                        </div>

                        <div class="profile-trendup-status-inner d-none no-info-section">
                            <div class="frame-parent2">
                                <div class="recommended-balance-parent">
                                    <div class="traders-must-standby-container">
                                        <p class="traders-must-standby risk_calculate_explanation">
                                            
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button class="generate-button">
                            <div class="generate">Generate</div>
                        </button>
                    </div>
                </div>
                <div class="understand-the-risk-expert-adv-wrapper mt-4">
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
        </div>
    </section>
    <div class="hometrendup-status-profile-container">
        <div class="hometrendup-status-profile">
            <div class="profile">
                <a href="{{ route(homeRoute())  }}">
                    <img class="home-trend-up-icon" loading="lazy" alt=""
                    src="{{ asset('assets/frontend/img/hometrendup.svg') }}" />
                </a>

                <a href="{{ route('frontend.member.grow-team-page')  }}">
                    <img class="status-up-icon" loading="lazy" alt=""
                    src="{{ asset('assets/frontend/img/statusup.svg') }}" id="statusUpIcon" />
                </a>

                <a href="{{ route('frontend.member.profile.index')  }}">
                    <img class="profile-icon" loading="lazy" alt="" src="{{ asset('assets/frontend/img/profile.svg') }}"
                    id="profileIcon" />
                </a>
            </div>
        </div>
    </div>
@endsection
@push('after-scripts')
<script type="text/javascript">
    $(document).on('click', '.generate-button', function(){
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        var pairs = $('#pairs').val();
        var risk_level = $('#risk_level').val();
        var lot = $('#lot').val();

        if(pairs == '' || risk_level == '' || lot == ''){
            $('.info-section').addClass('d-none');
            $('.no-info-section').removeClass('d-none');
            $('.no-info-section').find('.risk_calculate_explanation').html('Please select above all fields');
        } else {

            $.ajax({
                url: '{{ route("frontend.member.get-risk-calculation-details") }}', 
                method: 'POST', 
                dataType: 'json', 
                data: { 
                    pairs: pairs, 
                    risk_level: risk_level, 
                    lot: lot 
                },
                headers: {
                    'X-CSRF-TOKEN': csrfToken 
                },
                success: function(response) {

                    if(response.data.status == false){
                        $('.info-section').addClass('d-none');
                        $('.no-info-section').removeClass('d-none');
                        $('.no-info-section').find('.risk_calculate_explanation').html(response.data.message);
                    }else{
                        $('.no-info-section').addClass('d-none');
                        $('.info-section').removeClass('d-none');
                        $('.info-section').find('.risk_calculate_explanation').html(response.data.explanation);
                        $('.info-section').find('.risk_calculate_balance').html(response.data.balance);
                        
                    }
                }
            });
        }
    })
</script>
@endpush
