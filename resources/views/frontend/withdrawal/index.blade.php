@extends('frontend.layouts.app')

@section('title', __('Withdrawal History'))
@section('page_name', 'dashboard-withdraw-history')

@push('after-styles')
    <link href="{{ asset('assets/frontend/css/withdraw_to_history.css') }}" rel="stylesheet" type="text/css" />

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

        .common-save-wrapper {
            flex: 1;
            border-radius: 32px;
            background-color: #2691b5;
            display: flex;
            flex-direction: row;
            align-items: flex-start;
            justify-content: center;
            padding: 16.5px var(--padding-xl);
            box-sizing: border-box;
            white-space: nowrap;
            max-width: 100%;
        }

         .common-long-cta {
            display: flex;
            align-items: flex-start;
            max-width: 100%;
        }

        .common-long-cta {
            cursor: pointer;
            border: 0;
            padding: 0;
            background-color: transparent;
            align-self: stretch;
            flex-direction: row;
            justify-content: flex-start;
        }

        .common-save {
            width: 110px;
            position: relative;
            font-size: var(--font-size-base);
            line-height: 21px;
            display: inline-block;
            font-family: var(--medium-medium-14);
            color: var(--color-white);
            text-align: center;
            min-width: 110px;
        }


    </style>
@endpush

@section('content')
    <section class="frame-parent">
        <div class="frame-wrapper">
            <div class="frame-container">
                <div class="frame-div">
                    <div class="frame-wrapper1">
                        <div class="frame-parent1">
                            <a class="arrow-left-wrapper" id="frameContainer" href="{{ url()->previous() }}">
                                <img class="arrow-left-icon" loading="lazy" alt=""
                                    src="{{ asset('assets/frontend/img/arrowleft.svg') }}" />
                            </a>
                            <div class="withdraw-history-label">
                                <div class="withdraw-history">Withdraw History</div>
                            </div>
                        </div>
                    </div>
                </div>

                @forelse ($withdrawals as $withdrawal)
                    <div class="frame-wrapper2">
                        <div class="frame-parent2">
                            <div class="frame-parent3">
                                <div class="withdraw-button-parent">
                                    <div class="withdraw-button">
                                        <div class="withdraw">Withdraw</div>
                                    </div>
                                    <div class="{{$withdrawal->status}}">{{ucfirst($withdrawal->status)}}</div>
                                </div>
                                <div class="amount-parent">
                                    <div class="amount">Amount</div>
                                    <div class="idr-4000000">
                                        <span class="idr">IDR</span>
                                        <b class="b">{{formatAmount($withdrawal->amount)}}</b>
                                    </div>
                                </div>
                            </div>
                            <div class="help-button">
                                <div class="mar-2023-wrapper">
                                    <div class="mar-2023">{{$withdrawal->created_at->format('j M Y')}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div style="display:flex;align-items: center;flex-direction:column;gap:20px;width: 100%;">

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
                                    <b class="your-request-submitted">No withdrawal request added yet!</b>
                              </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('frontend.withdrawal.create') }}" class="common-long-cta">
                                  <div class="common-save-wrapper">
                                    <b class="common-save">Withdraw Now</b>
                                  </div>
                                </a>
                            </div>
                        </div>

                         <!-- <h1>No withdrawal request added yet!</h1>
                        <x-utils.link class="btn-default" :text="__('Withdraw Now')" />  -->
                    </div>

                    
                @endforelse


                {{-- <div class="frame-wrapper2">
                    <div class="frame-parent2">
                        <div class="frame-parent3">
                            <div class="withdraw-button-parent">
                                <div class="withdraw-button">
                                    <div class="withdraw">Withdraw</div>
                                </div>
                                <div class="paid">Paid</div>
                            </div>
                            <div class="amount-parent">
                                <div class="amount">Amount</div>
                                <div class="idr-4000000">
                                    <span class="idr">IDR</span>
                                    <b class="b"> 4.000.000</b>
                                </div>
                            </div>
                        </div>
                        <div class="help-button">
                            <div class="mar-2023-wrapper">
                                <div class="mar-2023">10 Mar 2023</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="frame-parent4">
                    <div class="frame-parent5">
                        <div class="frame-parent6">
                            <div class="frame-parent7">
                                <div class="withdraw-wrapper">
                                    <div class="withdraw1">Withdraw</div>
                                </div>
                                <div class="processing">Processing</div>
                            </div>
                            <div class="amount-group">
                                <div class="amount1">Amount</div>
                                <div class="idr-40000001">
                                    <span class="idr1">IDR</span>
                                    <b class="b1"> 4.000.000</b>
                                </div>
                            </div>
                        </div>
                        <div class="frame-wrapper3">
                            <div class="mar-2023-container">
                                <div class="mar-20231">10 Mar 2023</div>
                            </div>
                        </div>
                    </div>
                    <div class="frame-wrapper4">
                        <div class="frame-parent8">
                            <div class="frame-parent9">
                                <div class="frame-parent10">
                                    <div class="withdraw-container">
                                        <div class="withdraw2">Withdraw</div>
                                    </div>
                                    <div class="failed">Failed</div>
                                </div>
                                <div class="amount-container">
                                    <div class="amount2">Amount</div>
                                    <div class="idr-40000002">
                                        <span class="idr2">IDR</span>
                                        <b class="b2"> 4.000.000</b>
                                    </div>
                                </div>
                            </div>
                            <div class="frame-wrapper5">
                                <div class="mar-2023-frame">
                                    <div class="mar-20232">10 Mar 2023</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
@endsection
@push('after-scripts')
@endpush
