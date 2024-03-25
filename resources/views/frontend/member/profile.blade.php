@extends('frontend.layouts.app')

@section('title', __('Profile'))
@section('page_name', 'profile')

@push('after-styles')
    <link href="{{ asset('assets/frontend/css/profile.css') }}" rel="stylesheet" type="text/css" />  
@endpush

@section('content')
 <section class="profile-picture-wrapper">
        <div class="profile-picture">
          <div class="profile-picture-inner">
            <div class="long-c-t-a-label-parent">
              <div class="long-c-t-a-label" id="longCTALabel">
                <img
                  class="arrow-left-icon"
                  loading="lazy"
                  alt=""
                  src="{{ asset('assets/frontend/img/arrowleft.svg') }}"
                />
              </div>
              <div class="profile-wrapper">
                <div class="profile1">Profile</div>
              </div>
            </div>
          </div>
          <h2 class="michael-jordan">Michael Jordan</h2>
          <form class="field-field-field-field-field-parent">
            <div class="field-field-field-field-field">
              <div class="field">
                <div class="unit">Email</div>
                <div class="rectangle-group">
                  <div class="frame-inner"></div>
                  <input
                    class="michaeljordandaytonfintechco"
                    placeholder="michaeljordan@daytonfintech.com"
                    type="text"
                  />

                  <div class="edit-wrapper">
                    <img class="edit-icon" alt="" src="{{ asset('assets/frontend/img/edit.svg') }}" />
                  </div>
                </div>
              </div>
              <div class="field1">
                <div class="unit1">Name</div>
                <div class="rectangle-container">
                  <div class="rectangle-div"></div>
                  <input
                    class="rnistudio99"
                    placeholder="Michael Jordan"
                    type="text"
                  />

                  <div class="edit-container">
                    <img class="edit-icon1" alt="" src="{{ asset('assets/frontend/img/edit-1.svg') }}" />
                  </div>
                </div>
              </div>
              <div class="field2">
                <div class="unit2">Phone Number</div>
                <div class="group-div">
                  <div class="frame-child1"></div>
                  <input
                    class="rnistudio991"
                    placeholder="0822314512312"
                    type="text"
                  />

                  <div class="edit-frame">
                    <img class="edit-icon2" alt="" src="{{ asset('assets/frontend/img/edit-2.svg') }}" />
                  </div>
                </div>
              </div>
              <div class="field3">
                <div class="unit3">Country</div>
                <div class="rectangle-parent1">
                  <div class="frame-child2"></div>
                  <div class="indonesia">Indonesia</div>
                  <div class="arrow-down-wrapper">
                    <img
                      class="arrow-down-icon"
                      alt=""
                      src="{{ asset('assets/frontend/img/arrowdown.svg') }}"
                    />
                  </div>
                </div>
              </div>
              <div class="field4">
                <div class="unit4">Change Password</div>
                <div class="rectangle-parent2">
                  <div class="frame-child3"></div>
                  <input
                    class="rnistudio992"
                    placeholder="********"
                    type="text"
                  />

                  <div class="frame-div">
                    <img class="edit-icon3" alt="" src="{{ asset('assets/frontend/img/edit-3.svg') }}" />
                  </div>
                </div>
              </div>
              <div class="field5">
                <div class="unit5">Retype Password</div>
                <div class="rectangle-parent3">
                  <div class="frame-child4"></div>
                  <input class="input" placeholder="********" type="text" />

                  <div class="edit-wrapper1">
                    <img class="edit-icon4" alt="" src="{{ asset('assets/frontend/img/edit-4.svg') }}" />
                  </div>
                </div>
              </div>
            </div>
            <button class="long-cta" id="longCTA">
              <div class="save-wrapper">
                <b class="save">Update</b>
              </div>
            </button>
            <div class="support-parent">
              <b class="support">Support</b>
              <div class="contact-us-label-parent">
                <div class="contact-us-label">
                  <img
                    class="support-help-questionheadph"
                    loading="lazy"
                    alt=""
                    src="{{ asset('assets/frontend/img/support-help-questionheadphones-customer-support.svg') }}"
                  />

                  <div class="help-center">Help Center</div>
                </div>
                <div class="contact-us-label1">
                  <img
                    class="phonesphone-call-icon"
                    loading="lazy"
                    alt=""
                    src="{{ asset('assets/frontend/img/phonesphone-call.svg') }}"
                  />

                  <div class="contact-us">Contact Us</div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </section>
      
      <div class="profile-child"></div>
@endsection
@push('after-scripts')
@endpush
