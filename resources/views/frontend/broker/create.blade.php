@extends('frontend.layouts.app')

@section('title', __('Add Account'))
@section('page_name', 'member-area-add-new-account')

@push('after-styles')
    <link href="{{ asset('assets/frontend/css/member_add_account.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <section class="add-account-button-inner">
        <div class="frame-group">
            <div class="frame-wrapper">
                <div class="frame-container">
                    <a class="arrow-left-wrapper" id="frameContainer" href="{{route('frontend.broker.index')}}">
                        <img class="arrow-left-icon" loading="lazy" alt=""
                            src="{{ asset('assets/frontend/img/arrowleft.svg') }}" />
                    </a>
                    <div class="new-broker-account-wrapper">
                        <div class="new-broker-account">New Broker Account</div>
                    </div>
                </div>
            </div>
            <div class="frame-div">
                <div class="unit-parent">
                    <div class="unit">Broker ID</div>
                    <div class="rectangle-group">
                        <div class="frame-inner"></div>
                        <input class="enter-broker-id" placeholder="Enter broker ID" type="text" />
                    </div>
                </div>
                <div class="unit-group">
                    <div class="unit1">Broker Server</div>
                    <input class="group-input" placeholder="Enter broker server" type="text" />
                </div>
                <div class="unit-container">
                    <div class="unit2">Broker ID Password to activate EA</div>
                    <div class="rectangle-container">
                        <div class="rectangle-div"></div>
                        <input class="enter-broker-id1" placeholder="Enter broker ID" type="text" />

                        <div class="eye-icons">
                            <img class="vuesaxlineareye-icon" alt=""
                                src="{{ asset('assets/frontend/img/vuesaxlineareye.svg') }}" />
                        </div>
                    </div>
                </div>
                <div class="pairs-parent">
                    <div class="pairs">Pairs</div>
                    <input class="frame-child1" placeholder="Enter pairs" type="text" />
                </div>
                <div class="risk-level-parent">
                    <div class="risk-level">Risk Level</div>
                    <div class="group-div">
                        <div class="frame-child2"></div>
                        <div class="select-risk-level">Select risk level</div>
                        <div class="vuesaxlineararrow-down-wrapper">
                            <img class="vuesaxlineararrow-down-icon" alt=""
                                src="{{ asset('assets/frontend/img/arrowdown.svg') }}" />
                        </div>
                    </div>
                </div>


                <div class="lot-parent">
                    <div class="lot">Lot</div>
                    <div class="rectangle-parent1">
                        <div class="frame-child3"></div>
                        <div class="enter-lot-amount">Enter lot amount</div>
                        <div class="vuesaxlineararrow-down-container">
                            <img class="vuesaxlineararrow-down-icon1" alt=""
                                src="{{ asset('assets/frontend/img/arrowdown.svg') }}" />
                        </div>
                    </div>
                </div>
                <div class="frame-parent1">
                    <input class="frame-input" type="checkbox" />

                    <div class="i-understand-that">
                        I understand that the risk of trading might occur, recommended
                        balance from Dayton Fintech is only to minimize the risk of
                        losses, not a guarantee
                    </div>
                </div>
                <div class="frame-parent2">
                    <input class="frame-input1" type="checkbox" />

                    <div class="do-not-change">
                        Do not change your password without any confirmation to Expert
                        Advisor, A password change without confirmation will
                        automatically stopped the EA
                    </div>
                </div>
                <div class="long-cta" id="longCTAContainer">
                    <button class="save-wrapper">
                        <b class="save">Activate EA</b>
                    </button>
                </div>
                <div class="frame-child4"></div>
            </div>
        </div>
    </section>
@endsection
@push('after-scripts')
@endpush
