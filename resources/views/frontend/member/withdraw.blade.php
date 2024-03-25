@extends('frontend.layouts.app')

@section('title', __('Withdraw Now'))
@section('page_name', 'dashboard-withdraw-now')

@push('after-styles')
    <link href="{{ asset('assets/frontend/css/withdraw.css') }}" rel="stylesheet" type="text/css" />  
@endpush

@section('content')

<section class="dashboard-withdraw-now-inner">
  <form class="frame-group">
    <div class="frame-container">
      <div class="arrow-left-wrapper" id="frameContainer">
        <img
          class="arrow-left-icon"
          loading="lazy"
          alt=""
          src="{{ asset('assets/frontend/img/arrowleft.svg') }}"
        />
      </div>
      <div class="withdraw-wrapper">
        <div class="withdraw">Withdraw</div>
      </div>
    </div>
    <div class="bank-name-parent">
      <div class="bank-name">Bank Name</div>
      <input
        class="frame-inner"
        placeholder="Enter bank name"
        type="text"
      />

      <div class="bank-account-number">Bank Account Number</div>
      <input
        class="group-input"
        placeholder="Enter account number"
        type="text"
      />
    </div>
    <div class="bank-account-name-parent">
      <div class="bank-account-name">Bank Account Name</div>
      <input
        class="frame-child1"
        placeholder="Enter account name"
        type="text"
      />

      <div class="amount">Amount</div>
      <input
        class="frame-child2"
        placeholder="Enter withdraw amount"
        type="text"
      />
    </div>
    <button class="long-cta" id="longCTA">
      <div class="save-button-label">
        <b class="save">Submit</b>
      </div>
    </button>
  </form>
</section>

@endsection
@push('after-scripts')
@endpush
