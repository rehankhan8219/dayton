@extends('frontend.layouts.app')

@section('title', __('Add Account'))
@section('page_name', 'member-area-add-new-account')

@push('after-styles')
    <link href="{{ asset('assets/frontend/css/member_add_account.css') }}" rel="stylesheet" type="text/css" />
    <style type="text/css">
   .frame-child-selectbox {
       height: 50px;
       width: 100%;
       position: absolute;
       margin: 0 !important;
       top: 0;
       right: 0;
       bottom: 0;
       left: 0;
       border-radius: var(--br-3xs);
       background-color: var(--color-gray-300);
       padding-left: 20px;
       color: var(--bw-dark-gray);
       font-size: var(--medium-medium-14-size);
       font-weight: 500;
       font-family: var(--medium-medium-14);
   }
   .frame-child-selectbox {
       -webkit-appearance: none; /* Remove default arrow on Chrome/Safari */
       -moz-appearance: none; /* Remove default arrow on Firefox */
       appearance: none; /* Remove default arrow on other browsers */
   }
   .frame-child-selectbox::-ms-expand {
    display: none; /* Remove default arrow on IE/Edge */
   }
   .custom-caret {
       position: absolute;
       top: 75%;
       right: 37px;
       transform: translateY(-50%);
       pointer-events: none; 
   }

    .field {
        flex-direction: column;
        justify-content: flex-start;
        gap: var(--gap-xs);
        width: 500px;
    }

    .field, .rectangle-group {
        align-self: stretch;
        display: flex;
        align-items: flex-start;
    }

    .eye-icons{
        cursor: pointer;
        position: relative;
    }

    .broker-frame-item.active {
       border: 1px solid #2691b5;
       background-color: rgba(255, 255, 255, 0.1);
   }

</style>
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
            <x-forms.post :action="route('frontend.broker.store')">
            <div class="frame-div">

                <div class="unit-container">
                    <div class="unit2">Broker ID</div>
                    <div class="rectangle-container">
                        <div class="rectangle-div broker-frame-item active"></div>
                         <input name="broker_id" required class="broker-input" placeholder="Enter broker ID" type="text" />
                    </div>
                </div>

                <div class="unit-container">
                    <div class="unit2">Broker Server</div>
                    <div class="rectangle-container">
                        <div class="rectangle-div broker-frame-item"></div>
                          <input name="broker_server" required class="broker-input" placeholder="Enter broker server" type="text" />
                    </div>
                </div>

                <div class="unit-container">
                    <div class="unit2">Broker ID Password to activate EA</div>
                    <div class="rectangle-container">
                        <div class="rectangle-div broker-frame-item"></div>
                        <input name="broker_password" id="broker_password" required class="broker-input" placeholder="Enter broker ID" type="password" />

                        <div class="eye-icons">
                                 <button class="btn btn-transparent p-0 "  type="button" style="display: contents;"><i
                                    class="mdi mdi-eye-outline password_visible_toggler"
                                    id="register_field_password_visible_toggler" data-id="broker_password"></i></button>
                        </div>

                    </div>
                </div>

                <div class="unit-container">
                    <div class="unit2">Pairs</div>
                    <div class="rectangle-container">
                        <div class="rectangle-div broker-frame-item"></div>
                          <input name="pairs" required class="broker-input" placeholder="Enter pairs" type="text" />
                    </div>
                </div>

                <div class="field signup-selectbox-field">
                   <div class="pairs">Risk Level</div>
                   <div class="rectangle-parent1">
                      {{ html()->select('risk_calculator_id', $risk_levels)
                      ->class('form-control frame-child-selectbox')
                      ->placeholder(__('Select risk level'))
                      ->required() }}
                      <div class="custom-caret">
                         <img class="arrow-down-icon" alt=""
                            src="{{ asset('assets/frontend/img/arrowdown.svg') }}">
                      </div>
                   </div>
                </div>

                <div class="unit-container mt-3">
                    <div class="unit2">Lot</div>
                    <div class="rectangle-container">
                        <div class="rectangle-div broker-frame-item"></div>
                        <input name="lot" required class="broker-input" placeholder="Enter lot amount" type="text" />
                    </div>
                </div>

                <div class="frame-parent1">
                    <input class="frame-input" required type="checkbox" />

                    <div class="i-understand-that">
                        I understand that the risk of trading might occur, recommended
                        balance from Dayton Fintech is only to minimize the risk of
                        losses, not a guarantee
                    </div>
                </div>
                <div class="frame-parent2">
                    <input class="frame-input1" required type="checkbox" />

                    <div class="do-not-change">
                        Do not change your password without any confirmation to Expert
                        Advisor, A password change without confirmation will
                        automatically stopped the EA
                    </div>
                </div>
                <div class="long-cta" id="longCTAContainer">
                    <button type="submit" class="save-wrapper">
                        <b class="save">Activate EA</b>
                    </button>
                </div>
                <div class="frame-child4"></div>
                
            </div>
            </x-forms.post>
        </div>
    </section>
@endsection
@push('after-scripts')

<script type="text/javascript">
    $(".password_visible_toggler").click(function() {
        var id = $(this).data('id');

        var password = $("#" + id);
        if (password.attr("type") === "password") {
            password.attr("type", "text");

            $(this).removeClass('mdi-eye-outline');
            $(this).addClass('mdi-eye-off-outline');

        } else {
            password.attr("type", "password");
            $(this).addClass('mdi-eye-outline');
            $(this).removeClass('mdi-eye-off-outline');
        }
    });

    $(document).on("focus", "input, select", function() {
        $(".broker-frame-item").removeClass("active");
        $(this).parent().find(".broker-frame-item").addClass("active");
    });

</script>
@endpush
