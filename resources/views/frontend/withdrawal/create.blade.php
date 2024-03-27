@extends('frontend.layouts.app')

@section('title', __('Withdraw Now'))
@section('page_name', 'dashboard-withdraw-now')

@push('after-styles')
    <link href="{{ asset('assets/frontend/css/withdraw.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <section class="dashboard-withdraw-now-inner">
        <x-forms.post :action="route('frontend.withdrawal.store')" class="frame-group">
            <div class="frame-container">
                <a class="arrow-left-wrapper" id="frameContainer" href="{{route(homeRoute())}}">
                    <img class="arrow-left-icon" loading="lazy" alt=""
                        src="{{ asset('assets/frontend/img/arrowleft.svg') }}" />
                </a>
                <div class="withdraw-wrapper">
                    <div class="withdraw">Withdraw</div>
                </div>
            </div>
            <div class="bank-name-parent">
                <div class="bank-name">Bank Name</div>
                {{ html()->text('bank_name')
                    ->class('frame-inner')
                    ->placeholder(__('Enter bank name'))
                    ->required()
                    ->autofocus() }}

                <div class="bank-account-number">Bank Account Number</div>
                {{ html()->text('bank_account_number')
                    ->class('group-input')
                    ->placeholder(__('Enter account number'))
                    ->required() }}
            </div>
            <div class="bank-account-name-parent">
                <div class="bank-account-name">Bank Account Name</div>
                {{ html()->text('bank_account_name')
                    ->class('frame-child1')
                    ->placeholder(__('Enter account name'))
                    ->required() }}

                <div class="amount">Amount</div>
                {{ html()->text('amount')
                    ->class('frame-child2')
                    ->placeholder(__('Enter withdraw amount'))
                    ->required() }}
            </div>
            <button class="long-cta" id="longCTA" type="submit">
                <div class="save-button-label">
                    <b class="save">Submit</b>
                </div>
            </button>
        </x-forms.post>
    </section>

@endsection
@push('after-scripts')
@endpush
