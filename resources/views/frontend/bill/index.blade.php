@extends('frontend.layouts.app')

@section('title', __('Pay Now'))
@section('page_name', 'member-area-pay-now')

@push('after-styles')
    <link href="{{ asset('assets/frontend/css/pay_now.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="frame-wrapper">
        <div class="frame-group">
            <div class="frame-container">
                <div class="frame-div">
                    <a class="arrow-left-wrapper" href="{{route(homeRoute())}}">
                        <img class="arrow-left-icon" loading="lazy" alt=""
                            src="{{ asset('assets/frontend/img/arrowleft.svg') }}" />
                    </a>
                    <div class="pay-now-wrapper">
                        <div class="pay-now">Pay Now</div>
                    </div>
                </div>
            </div>
            <div class="bank-info-label">
                <div class="rectangle-back"></div>
                <div class="bank-account">Bank Account</div>
                <div class="briva-paperid-parent">
                    <div class="briva-paperid">{{$bank->bank_account_name}}</div>
                    <b class="b">{{$bank->bank_account}}</b>
                    <div class="bank-bca-parent">
                        <div class="bank-bca">{{$bank->bank}}</div>
                        <div class="i-d-r-label">
                            <div class="idr-140000301">
                                <span class="idr">IDR</span>
                                <b class="b1">{{$amount}}</b>
                            </div>
                            <div class="please-note-that-the-amount-yo-wrapper">
                                <div class="please-note-that">
                                    Please note that the amount you have to transfer might
                                    be various, the last 3 digit-number is unique code to
                                    make an easier approval.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($amount > 0)
                    <x-forms.post :action="route('frontend.bill.store')">
                        {{ html()->hidden('amount', $amount) }}
                        <button class='btn-default' type="submit">@lang('Confirm Payment')</button>
                    </x-forms.post>
                @endif
            </div>
        </div>
    </div>
@endsection
@push('after-scripts')
@endpush
