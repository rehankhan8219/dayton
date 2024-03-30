@extends('frontend.layouts.app')

@section('title', __('Sign up'))
@section('page_name', 'member-area-sign-up')

@push('after-styles')
    <link href="{{ asset('assets/frontend/css/signup.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <section class="sign-up-c-t-a-wrapper">
        <x-forms.post :action="route($redirectBase.'.auth.register')" class="sign-up-c-t">
            <div class="frame-group">
                <img class="frame-item" loading="lazy" alt="" src="{{ asset('assets/frontend/img/group-3.svg') }}" />

                <div class="a-parent">
                    <img class="a-icon" loading="lazy" alt="" src="{{ asset('assets/frontend/img/a.svg') }}" />

                    <div class="b-wrapper">
                        <img class="b-icon" loading="lazy" alt="" src="{{ asset('assets/frontend/img/b.svg') }}" />
                    </div>
                    <div class="confirm-password-field">
                        <img class="c-icon" loading="lazy" alt="" src="{{ asset('assets/frontend/img/c.svg') }}" />
                    </div>
                    <div class="sign-in-c-t-a">
                        <div class="d-parent">
                            <img class="d-icon" loading="lazy" alt=""
                                src="{{ asset('assets/frontend/img/d.svg') }}" />

                            <img class="group-icon1" loading="lazy" alt=""
                                src="{{ asset('assets/frontend/img/group-1.svg') }}" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="get-your-dayton-account-parent">
                <h3 class="get-your-dayton">Get Your Dayton Account!</h3>
                <div class="please-fill-in">
                    Please fill in the form to continue
                </div>
            </div>
            <div class="email-input-field">
                <div class="phone-number-input-field">
                    <div class="unit">Name</div>
                    <div class="confirm-password-input-field-parent">
                        <div class="confirm-password-input-field frame-item active"></div>
                        {{ html()->text('name')
                            ->class('enter-your-name')
                            ->placeholder(__('Enter your name'))
                            ->maxlength(191)
                            ->required()
                            ->attribute('autocomplate', 'new_username')
                            ->autofocus() }}
                    </div>
                </div>

                <div class="phone-number-input-field1">
                    <div class="unit1">Email</div>
                    <div class="rectangle-parent">
                        <div class="frame-inner frame-item"></div>
                        {{ html()->email('email')
                            ->class('enter-your-email')
                            ->placeholder(__('Enter your email'))
                            ->maxlength(191)
                            ->required()
                            ->attribute('autocomplate', 'email') }}
                    </div>
                </div>

                <div class="phone-number-input-field2">
                    <div class="unit2">Phone Number</div>
                    <div class="rectangle-group">
                        <div class="rectangle-div frame-item"></div>
                        {{ html()->text('phone')
                            ->class('enter-your-phone')
                            ->placeholder(__('Enter your phone number'))
                            ->maxlength(191)
                            ->required()
                            ->attribute('autocomplate', 'phone') }}
                    </div>
                </div>

                <div class="field signup-selectbox-field">
                    <div class="country">Country</div>
                    <div class="rectangle-container">
                        {{ html()->select('country', [
                            'Indonesia' => 'Indonesia',
                            'Malesiya' => 'Malesiya',
                            'Singapore' => 'Singapore',
                            'Vietnam' => 'Vietnam',
                            'Phillipine' => 'Phillipine',
                            'Thailand' => 'Thailand',
                        ])
                            ->class('form-control frame-child-selectbox')
                            ->placeholder(__('Choose country'))
                            ->required() }}
                        <div class="custom-caret">
                            <img class="arrow-down-icon" alt=""
                                src="{{ asset('assets/frontend/img/arrowdown.svg') }}">
                        </div>
                    </div>
                </div>


                <div class="phone-number-input-field3">
                    <div class="unit3">Password</div>
                    <div class="group-div">
                        <div class="frame-child2 frame-item"></div>
                        {{ html()->password('password_alt')
                            ->class('enter-your-password')
                            ->placeholder(__('Enter your password'))
                            ->maxlength(191)
                            ->required()
                            ->attribute('autocomplate', 'new-password') }}
                        <div class="vuesaxlineareye-wrapper">
                            <button class="btn btn-transparent p-0" type="button" style="display: contents;"><i
                                    class="mdi mdi-eye-outline password_visible_toggler" data-id="password_alt"
                                    id="register_field_password_visible_toggler"></i></button>
                        </div>
                    </div>
                </div>

                <div class="phone-number-input-field4">
                    <div class="unit4">Confirm Password</div>
                    <div class="rectangle-parent1">
                        <div class="frame-child3 frame-item"></div>
                        {{ html()->password('password_alt_confirmation')
                            ->class('enter-your-password1')
                            ->placeholder(__('Enter your password again'))
                            ->maxlength(191)
                            ->required()
                            ->attribute('autocomplate', 'new-password') }}
                        <div class="vuesaxlineareye-wrapper">
                            <button class="btn btn-transparent p-0" type="button" style="display: contents;"><i
                                    class="mdi mdi-eye-outline password_visible_toggler" data-id="password_alt_confirmation"
                                    id="register_field_confirm_password_visible_toggler"></i></button>
                        </div>
                    </div>
                </div>

                <div class="phone-number-input-field5 mb-3">
                    <div class="upline-code">Upline Code</div>
                    <div class="rectangle-parent2">
                        <div class="frame-child4 frame-item"></div>
                        {{ html()->password('upline')
                            ->class('enter-your-upline')
                            ->placeholder(__('Enter your upline code'))
                            ->maxlength(191)
                            ->required()
                            ->attribute('autocomplate', 'upline') }}

                        <div class="vuesaxlineareye-wrapper">
                            <button class="btn btn-transparent p-0" type="button" style="display: contents;"><i
                                    class="mdi mdi-eye-outline password_visible_toggler" data-id="upline"
                                    id="register_field_upline_visible_toggler"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="enter-email-label">
                <div class="enter-phone-number-label">
                    <button class="long-cta" id="longCTA">
                        <div class="save-wrapper">
                            <b class="save">Sign Up</b>
                        </div>
                    </button>
                    <div class="already-have-an-account-sign-wrapper">
                        <div class="already-have-an-container" id="alreadyHaveAn">
                            <span class="already-have-an-account">
                                <span class="already-have-an">Already have an account?</span>
                                <span class="span"> </span>
                            </span>
                            <a href="{{ route('frontend.auth.login') }}"><span class="sign-in">Sign In</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </x-forms.post>
    </section>
@endsection
@push('after-scripts')
    <script type="text/javascript">
        $(document).ready(function() {

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
                $(".frame-item").removeClass("active");
                $(this).parent().find(".frame-item").addClass("active");
            });
        });
    </script>
@endpush
