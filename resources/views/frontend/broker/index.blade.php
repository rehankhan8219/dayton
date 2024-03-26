@extends('frontend.layouts.app')

@section('title', __('Brokers List'))
@section('page_name', 'member-area-broker-list')

@push('after-styles')
    <link href="{{ asset('assets/frontend/css/broker_list.css') }}" rel="stylesheet" type="text/css" />
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
                @foreach($broker_list as $broker)
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
                                <div class="active">Active</div>
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
                                <div class="period-parent">
                                    <h2 class="period">Period</h2>
                                    <button class="jan-2023-21-jan-23-wrapper">
                                        <div class="jan-2023-">1 Jan 2023 - 21 Jan 23</div>
                                    </button>
                                </div>
                                <div class="disclaimer">
                                    <div class="due-date-parent">
                                        <h2 class="due-date">Due Date</h2>
                                        <img class="info-circle-icon" loading="lazy" alt=""
                                            src="{{ asset('assets/frontend/img/infocircle.svg') }}" />
                                    </div>
                                    <div class="jan1">
                                        <div class="jan-2023">22 Jan 2023</div>
                                    </div>
                                </div>
                            </div>
                            <div class="i-d-r">
                                <h3 class="bill">Bill</h3>
                                <div class="idr-4000000">
                                    <span class="idr">IDR</span>
                                    <b class="b"> 4.000.000</b>
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
                @endforeach
                <!-- <div class="frame-wrapper1">
                    <div class="frame-parent1">
                        <div class="frame-parent2">
                            <div class="frame-wrapper2">
                                <div class="aita-group">
                                    <h3 class="aita2">Aita</h3>
                                    <div class="div2">#50044143</div>
                                    <div class="processing">Processing</div>
                                </div>
                            </div>
                            <div class="frame-parent3">
                                <div class="lot-parent">
                                    <h2 class="lot2">Lot</h2>
                                    <div class="wrapper">
                                        <div class="div3">0.1</div>
                                    </div>
                                </div>
                                <div class="period-group">
                                    <h2 class="period1">Period</h2>
                                    <button class="jan-2023-21-jan-23-container">
                                        <div class="jan-2023-1">1 Jan 2023 - 21 Jan 23</div>
                                    </button>
                                </div>
                                <div class="frame-parent4">
                                    <div class="due-date-group">
                                        <h2 class="due-date1">Due Date</h2>
                                        <img class="info-circle-icon1" alt=""
                                            src="{{ asset('assets/frontend/img/infocircle-1.svg') }}" />
                                    </div>
                                    <div class="jan-2023-wrapper">
                                        <div class="jan-20231">22 Jan 2023</div>
                                    </div>
                                </div>
                            </div>
                            <div class="bill-parent">
                                <h3 class="bill1">Bill</h3>
                                <div class="idr-40000001">
                                    <span class="idr1">IDR</span>
                                    <b class="b1"> 4.000.000</b>
                                </div>
                            </div>
                        </div>
                        <div class="frame-wrapper3">
                            <button class="receipt-edit-group">
                                <img class="receipt-edit-icon1" alt=""
                                    src="{{ asset('assets/frontend/img/receiptedit-1.svg') }}" />

                                <div class="edit1">Edit</div>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="frame-wrapper4">
                    <div class="frame-parent5">
                        <div class="frame-parent6">
                            <div class="frame-wrapper5">
                                <div class="aita-container">
                                    <h3 class="aita3">Aita</h3>
                                    <div class="div4">#50044144</div>
                                    <div class="inactive">Inactive</div>
                                </div>
                            </div>
                            <div class="frame-parent7">
                                <div class="lot-group">
                                    <h2 class="lot3">Lot</h2>
                                    <div class="container">
                                        <div class="div5">0.1</div>
                                    </div>
                                </div>
                                <div class="period-container">
                                    <h2 class="period2">Period</h2>
                                    <button class="jan-2023-21-jan-23-frame">
                                        <div class="jan-2023-2">1 Jan 2023 - 21 Jan 23</div>
                                    </button>
                                </div>
                                <div class="frame-parent8">
                                    <div class="due-date-container">
                                        <h2 class="due-date2">Due Date</h2>
                                        <img class="info-circle-icon2" alt=""
                                            src="{{ asset('assets/frontend/img/infocircle-2.svg') }}" />
                                    </div>
                                    <div class="jan-2023-container">
                                        <div class="jan-20232">22 Jan 2023</div>
                                    </div>
                                </div>
                            </div>
                            <div class="bill-group">
                                <h3 class="bill2">Bill</h3>
                                <div class="idr-40000002">
                                    <span class="idr2">IDR</span>
                                    <b class="b2"> 4.000.000</b>
                                </div>
                            </div>
                        </div>
                        <div class="frame-wrapper6">
                            <button class="receipt-edit-container">
                                <img class="receipt-edit-icon2" alt=""
                                    src="{{ asset('assets/frontend/img/receiptedit-2.svg') }}" />

                                <div class="edit2">Edit</div>
                            </button>
                        </div>
                    </div>
                </div> -->
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
