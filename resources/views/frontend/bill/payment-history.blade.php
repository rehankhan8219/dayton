@extends('frontend.layouts.app')

@section('title', __('Payment History'))
@section('page_name', 'dashboard-withdraw-history')

@push('after-styles')
    <link href="{{ asset('assets/frontend/css/payment-history.css') }}" rel="stylesheet" type="text/css" />

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

        .paid {
            width: 26px;
            position: relative;
            font-size: var(--medium-medium-12-size);
            line-height: 160%;
            font-weight: 500;
            text-align: right;
            display: inline-block;
            min-width: 26px;
        }

        .unpaid {
            width: 42px;
            position: relative;
            font-size: var(--medium-medium-12-size);
            line-height: 160%;
            font-weight: 500;
            color: #fa2306;
            text-align: right;
            display: inline-block;
            min-width: 42px;
        }

        .details-wrapper {
            cursor: pointer;
            border: 1px solid var(--color-dimgray);
            background-color: transparent;
            position: absolute;
            border-radius: 25px;
            box-sizing: border-box;
            display: flex;
            flex-direction: row;
            align-items: flex-start;
            justify-content: flex-start;
            z-index: 1;
        }

        .details-wrapper:hover {
            background-color: var(--color-gray-500);
            border: 1px solid var(--color-gray-400);
            box-sizing: border-box;
        }

        .details2 {
            position: relative;
            font-size: var(--medium-medium-12-size);
            line-height: 160%;
            font-weight: 500;
            font-family: var(--medium-medium-12);
            color: var(--color-gray-200);
            text-align: left;
            display: inline-block;
            min-width: 40px;
            cursor: pointer;
        }

        .commision-date-format {
            position: relative;
            font-size: 10px;
            line-height: 160%;
            font-weight: 500;
            font-family: var(--semibold-semibold-14);
            color: var(--color-white);
            text-align: left;
            display: inline-block;
            min-width: 121px;
        }

        .commison-date-wrapper {
            cursor: pointer;
            border: 0;
            padding: var(--padding-9xs) var(--padding-xs);
            background-color: #2691b5;
            border-radius: 25px;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            white-space: nowrap;
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
                                <div class="withdraw-history">Payment History</div>
                            </div>
                        </div>
                    </div>
                </div>

                @forelse ($bills as $bill)
                    <div class="frame-wrapper2">
                        <div class="frame-parent2">
                            <div class="frame-parent3">
                                <div class="withdraw-button-parent">
                                    <div class="withdraw-button">
                                        <div class="withdraw">Period</div>
                                    </div>
                                    <div class="{{ $bill->status }}">{{ ucfirst($bill->status) }}</div>
                                </div>

                                <button class="commison-date-wrapper">
                                    <div class="commision-date-format">
                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d', $bill->start_date)->format('d M Y') }}
                                        -
                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d', $bill->end_date)->format('d M Y') }}
                                    </div>
                                </button>
                                
                                <div class="amount-parent">
                                    <div class="amount">Bill</div>
                                    <div class="idr-4000000">
                                        <span class="idr">IDR</span>
                                        <b class="b">{{ $bill->amount }}</b>
                                    </div>
                                </div>
                            </div>

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
                        </div>
                    </div>
                @empty
                    <div style="display:flex;align-items: center;flex-direction:column;gap:20px;width: 100%;">

                        <div class="row">
                            <div class="col-md-12 col-offset-3">
                                <div class="common-clock-wrapper">
                                    <img class="clock-icon" loading="lazy" alt=""
                                        src="{{ asset('assets/frontend/img/clock.svg') }}" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="your-request-submitted-wrapper">
                                    <b class="your-request-submitted">No payment history available!</b>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse

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
@endsection
@push('after-scripts')
@endpush
