@extends('frontend.layouts.app')

@section('title', __('Contact Us'))
@section('page_name', 'contact-us')

@push('after-styles')
    <link href="{{ asset('assets/frontend/css/contact_us.css') }}" rel="stylesheet" type="text/css" />  
    <style type="text/css">
      .submit-button-main{
         position: relative;
          top: 35px;
          left: 121px;
          width: 338px;
          flex-direction: column;
          gap: 526px;
      }
    </style>
@endpush

@section('content')
<main class="frame-parent">
        
        <section class="frame-wrapper">
          <div class="frame-container">
            <div class="frame-div">
              <div class="frame-parent1">
                <div class="frame-parent2">
                  <div class="arrow-left-wrapper" id="frameContainer">
                    <img
                      class="arrow-left-icon"
                      loading="lazy"
                      alt=""
                      src="{{ asset('assets/frontend/img/arrowleft.svg') }}"
                    />
                  </div>
                  <div class="contact-us-wrapper">
                    <div class="contact-us1">Contact Us</div>
                  </div>
                </div>
                <div class="phonesphone-call-parent">
                  <img
                    class="phonesphone-call-icon"
                    loading="lazy"
                    alt=""
                    src="{{ asset('assets/frontend/img/phonesphone-call.svg') }}"
                  />

                  <h2 class="contact-us2">Contact Us</h2>
                </div>
              </div>
            </div>
            <div class="subject-field-parent">

              <div class="row">
                <div class="col-md-2">
                  <label>Subject :</label>
                </div>
                <div class="col-md-6">
                   <input type="text" name="" style="width: 100%;">
                </div>
              </div>

              <div class="row mt-2">
                <div class="col-md-2">
                  <label>Message :</label>
                </div>
                <div class="col-md-9">
                  <textarea style="width:100%" rows="20"></textarea>
                </div>
              </div>
              <!-- <div class="subject-field">
                <div class="message-field">
                  <div class="">Subject :</div>
                  <input type="text" name="">
                </div>
                <div class="message">Message :</div>
              </div> -->
              <!-- <div class="long-c-t-a"></div> -->
              <div class="submit-button-main">
                <div class="submit-button-child1"></div>
                <button class="long-cta" id="longCTA">
                  <div class="submit-wrapper">
                    <b class="submit">Submit</b>
                  </div>
                </button>
              </div>
            </div>
            <div class="live-chat-telegram-wrapper">
              <div class="live-chat-telegram">
                <img
                  class="support-help-questionheadph"
                  loading="lazy"
                  alt=""
                  src="{{ asset('assets/frontend/img/support-help-questionheadphones-customer-support.svg') }}"
                />

                <div class="live-chat-wrapper">
                  <div class="live-chat">Live Chat :</div>
                </div>
                <div class="telegram-daytonfintech-wrapper">
                  <div class="telegram-daytonfintech">
                    Telegram @daytonfintech
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
      <div class="contact-us-child"></div>
@endsection
@push('after-scripts')
@endpush
