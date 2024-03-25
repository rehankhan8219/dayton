@extends('frontend.layouts.app')
@section('title', __('Help Center'))
@section('page_name', 'help-center')
@push('after-styles')
<link href="{{ asset('assets/frontend/css/help_center.css') }}" rel="stylesheet" type="text/css" />

<style type="text/css">
  .question-about-withdraw{
    font-weight: bold;
    cursor: pointer;
  }

  .leverage-withdraw{
    cursor: pointer;
  }
</style>
@endpush
@section('content')
<section class="previous-help-center-wrapper">
   <div class="previous-help-center">
      <div class="frame-group">
         <div class="arrow-left-wrapper" id="frameContainer">
           <a href="{{ url()->previous() }}"> <img
               class="arrow-left-icon"
               loading="lazy"
               alt=""
               src="{{ asset('assets/frontend/img/arrowleft.svg') }}"
               /></a>
         </div>
         <div class="frequently-asked-questions">
            <div class="help-center1">Help Center</div>
         </div>
      </div>
      <div class="leverage-commission-withdraw">
         <div class="phone-symbol">
            <img
               class="phonesphone-call-icon"
               alt=""
               src="{{ asset('assets/frontend/img/support-help-questionheadphones-customer-support.svg') }}"
               />
            <h3 class="help-center2">Help Center</h3>
         </div>
         <div id="accordion" class="w-100">
            @foreach ($help_categories as $index => $help_category)
            <div>
               <div class="leverage-withdraw" id="heading_{{ $help_category->id }}" data-toggle="collapse" data-target="#collapse_{{ $help_category->id }}" aria-expanded="false">
                  <div class="leverage-withdraw-inner">
                     <div class="frame-container">
                        <div class="leverage-wrapper">
                           <img
                              class="leverage-icon"
                              loading="lazy"
                              alt=""
                              src="{{ asset('assets/frontend/img/vector-1.svg') }}"
                              />
                        </div>
                        <b class="leverage">{{ $help_category->name }}</b>
                     </div>
                  </div>
                  <div class="leverage-withdraw-child"></div>
                  <div class="withdraw-button">
                     <div class="div">&gt;</div>
                     <div class="div1">&gt;</div>
                  </div>
               </div>
              
               <div id="collapse_{{ $help_category->id }}" class="collapse" aria-labelledby="heading_{{ $help_category->id }}" data-parent="#accordion" style="margin-top: -30px;">
                  <div class="card-body p-0">
                     <div id="accordion_sub_{{ $help_category->id }}">
                        <div class="question-about-withdraw-how-t-wrapper mt-5">
                           <div class="question-about-withdraw-container">

                               @php
                                  $help_details = getHelpCenterDetailsFromCategory($help_category->id);
                               @endphp

                              <ol class="question-about-withdraw-how-t">

                                @if(count($help_details) != 0)
                                   @foreach($help_details as $help_detail)
                                   <li class="question-about-withdraw" id="headingSub_{{ $help_detail->id }}" data-toggle="collapse" data-target="#collapseSub_{{ $help_detail->id }}" aria-expanded="false">
                                      {!! $help_detail->title !!}
                                   </li>
                                   <div id="collapseSub_{{ $help_detail->id }}" class="collapse" aria-labelledby="headingSub_{{ $help_detail->id }}" data-parent="#accordion_sub_{{ $help_category->id }}">
                                      <div class="card-body">
                                         {!! nl2br($help_detail->explanation) !!}
                                      </div>
                                   </div>
                                   @endforeach
                                @else
                                    <span style="text-decoration: none;">
                                      No Data Available
                                   </span>
                                @endif   
                              </ol>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
      </div>
   </div>
</section>
<div class="help-center-child"></div>
<section class="help-center-inner">
   <div class="support-help-questionheadph-parent">
      <img
         class="support-help-questionheadph"
         loading="lazy"
         alt=""
         src="{{ asset('assets/frontend/img/support-help-questionheadphones-customer-support.svg') }}"
         />
      <div class="live-chat-telegram-instance">
         <div class="live-chat">Live Chat :</div>
      </div>
      <div class="live-chat-telegram-instance1">
         <div class="telegram-daytonfintech">{{ setting('script') }}</div>
      </div>
   </div>
</section>
@endsection
@push('after-scripts')
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endpush