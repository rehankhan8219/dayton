@extends('frontend.layouts.app')

@section('title', __('Brokers List'))
@section('page_name', 'member-area-broker-list')

@push('after-styles')
    <link href="{{ asset('assets/frontend/css/broker_list.css') }}" rel="stylesheet" type="text/css" />

    <style type="text/css">
        .common-clock-wrapper {
            height: 120px;
            width: 120px;
            border-radius: 10000px;
            background-color: rgba(0, 163, 255, 0.05);
            justify-content: flex-start;
            padding: var(--padding-xl);
            box-sizing: border-box;
        }

    </style>
@endpush

@section('content')
    <section class="member-area-broker-list-inner">
        <div class="frame-group">
            <div class="frame-container">
                <a class="arrow-left-wrapper" id="frameContainer" href="{{route(homeRoute())}}">
                    <img class="arrow-left-icon" loading="lazy" alt="" src="{{ asset('assets/frontend/img/arrowleft.svg') }}" />
                </a>
                <div class="log-out1">
                    <h2 class="broker-account-list">@lang('Broker Account List')</h2>
                </div>
                <div class="frame-wrapper">
                    <a class="rectangle-group" id="groupButton" href="{{route('frontend.broker.create')}}">
                        <div class="frame-inner"></div>
                        <div class="new-broker-account">+ New Broker Account</div>
                    </a>
                </div>
            </div>
            <div class="frame-div">
               
                @forelse($broker_list as $broker)

                @php
                    $broker_bill_detail = getBrokerBillDetails($broker->id);
                @endphp
                <div class="aita-wrapper">
                    <div class="aita">
                        <div class="semicolon">
                            <div class="processing-inactive">
                                <div class="aita-parent">
                                    <h3 class="aita1">Aita</h3>
                                    <div class="div">
                                        <span class="span">#{{ $broker->broker_id }}</span>
                                        <span></span>
                                    </div>
                                </div>

                                @if($broker->active == 1)
                                    <div class="active">Active</div>
                                @elseif($broker->active == 2)
                                    <div class="processing">Error</div>
                                @elseif($broker->active == 0)
                                    <div class="inactive">Nonactive</div>
                                @endif
                            </div>
                            <div class="jan">
                                <div class="lot">
                                    <h2 class="lot1">Lot</h2>
                                    <div class="semicolon1">
                                        <div class="div1">{{ $broker->lot }}</div>
                                    </div>
                                </div>
                                <div class="pairs-parent">
                                    <h2 class="pairs">Pairs</h2>
                                    <button class="a-u-d-c-a-d">
                                        <div class="audcad">{{ $broker->pairs }}</div>
                                    </button>
                                </div>
                                @if(!empty($broker_bill_detail))
                                
                                <div class="period-parent">
                                    <h2 class="period">Period</h2>
                                    <button class="jan-2023-21-jan-23-wrapper">
                                        <div class="jan-2023-">
                                            {{ \Carbon\Carbon::createFromFormat('Y-m-d', $broker_bill_detail['start_date'])->format('d M Y') }}
                                                - 
                                            {{ \Carbon\Carbon::createFromFormat('Y-m-d', $broker_bill_detail['end_date'])->format('d M Y') }}
                                        </div>
                                    </button>
                                </div>
                                <div class="disclaimer">
                                    <div class="due-date-parent">
                                        <h2 class="due-date">Due Date</h2>
                                        <img class="info-circle-icon" loading="lazy" alt=""
                                            src="{{ asset('assets/frontend/img/infocircle.svg') }}" />
                                    </div>
                                    <div class="jan1">
                                        <div class="jan-2023">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $broker_bill_detail['due_date'])->format('d M Y') }}</div>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="i-d-r">
                                <h3 class="bill">Bill</h3>
                                <div class="idr-4000000">
                                    <span class="idr">IDR</span>
                                    <b class="b"> 
                                        @if(!empty($broker_bill_detail))
                                            {{ $broker_bill_detail['amount'] }}
                                        @else
                                            0.00
                                        @endif
                                    </b>
                                </div>
                            </div>
                        </div>
                        <div class="risk-expert-advisors">
                            <a class="receipt-edit-parent" id="frameButton1" href="{{route('frontend.broker.edit',$broker)}}">
                                <img class="receipt-edit-icon" alt=""
                                    src="{{ asset('assets/frontend/img/receiptedit.svg') }}" />

                                <div class="edit">Edit</div>
                            </a>
                        </div>
                    </div>
                </div>

                @empty
                <div style="display:flex;align-items: center;flex-direction:column;gap:25px;width: 100%;">

                        <div class="row">
                            <div class="col-md-12 col-offset-3">
                                <div class="common-clock-wrapper">
                                <img
                                  class="clock-icon"
                                  loading="lazy"
                                  alt=""
                                  src="{{ asset('assets/frontend/img/clock.svg') }}"
                                />
                              </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="your-request-submitted-wrapper">
                                    <b class="your-request-submitted">No Broker Account</b>
                              </div>
                            </div>
                        </div>
                    </div>

                    
                @endforelse
               
            </div>
            <div class="understand-risks">
                <h3 class="understand-the-risk-container">
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
                </h3>
            </div>
        </div>
    </section>
@endsection
@push('after-scripts')
@endpush
