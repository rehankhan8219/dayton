@extends('frontend.layouts.app')
@section('title', __('Profile'))
@section('page_name', 'profile')
@push('after-styles')
<link href="{{ asset('assets/frontend/css/profile.css') }}" rel="stylesheet" type="text/css" />
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
   .edit-input{
   cursor: pointer;
   }
</style>
@endpush
@section('content')
<section class="profile-picture-wrapper">
   <div class="profile-picture">
      <div class="profile-picture-inner">
         <div class="long-c-t-a-label-parent">
            <div class="long-c-t-a-label" id="longCTALabel">
               <a href="{{ url()->previous() }}">
               <img
                  class="arrow-left-icon"
                  loading="lazy"
                  alt=""
                  src="{{ asset('assets/frontend/img/arrowleft.svg') }}"
                  />
               </a>
            </div>
            <div class="profile-wrapper">
               <div class="profile1">Profile</div>
            </div>
         </div>
      </div>
      <h2 class="michael-jordan">{{ $user_detail->name }}</h2>
      <x-forms.patch :action="route('frontend.member.profile.update', $user_detail)" class="field-field-field-field-field-parent">
         <div class="field-field-field-field-field">
            <div class="field">
               <div class="unit">Email</div>
               <div class="rectangle-group">
                  <div class="frame-inner"></div>
                  <input
                     name = "email"
                     class="michaeljordandaytonfintechco"
                     placeholder="Email"
                     type="text"
                     value="{{ $user_detail->email }}"
                     readonly 
                     required
                     />
                  <div class="edit-wrapper edit-input">
                     <img class="edit-icon" alt="" src="{{ asset('assets/frontend/img/edit.svg') }}" />
                  </div>
               </div>
            </div>
            <div class="field1">
               <div class="unit1">Name</div>
               <div class="rectangle-container">
                  <div class="rectangle-div"></div>
                  <input
                     name = "name"
                     class="rnistudio99"
                     placeholder="Michael Jordan"
                     type="text"
                     value="{{ $user_detail->name }}"
                     readonly 
                     required
                     />
                  <div class="edit-container edit-input">
                     <img class="edit-icon" alt="" src="{{ asset('assets/frontend/img/edit-1.svg') }}" />
                  </div>
               </div>
            </div>
            <div class="field2">
               <div class="unit2">Phone Number</div>
               <div class="group-div">
                  <div class="frame-child1"></div>
                  <input
                     name = "phone"
                     class="rnistudio991"
                     placeholder="0822314512312"
                     type="text"
                     value="{{ $user_detail->phone }}"
                     readonly 
                     />
                  <div class="edit-frame edit-input">
                     <img class="edit-icon" alt="" src="{{ asset('assets/frontend/img/edit-2.svg') }}" />
                  </div>
               </div>
            </div>
            <div class="field signup-selectbox-field">
               <div class="unit3">Country</div>
               <div class="rectangle-parent1">
                  {{ html()->select('country', [
                  'Indonesia' => 'Indonesia',
                  'Malesiya' => 'Malesiya',
                  'Singapore' => 'Singapore',
                  'Vietnam' => 'Vietnam',
                  'Phillipine' => 'Phillipine',
                  'Thailand' => 'Thailand',
                  ])
                  ->value($user_detail->country)
                  ->class('form-control frame-child-selectbox')
                  ->placeholder(__('Choose country'))
                  ->required() }}
                  <div class="custom-caret">
                     <img class="arrow-down-icon" alt=""
                        src="{{ asset('assets/frontend/img/arrowdown.svg') }}">
                  </div>
               </div>
            </div>
            <div class="field4 mt-3">
               <div class="unit4">Change Password</div>
               <div class="rectangle-parent2">
                  <div class="frame-child3"></div>
                  <input
                     name = "password"
                     class="rnistudio992"
                     placeholder="********"
                     type="password"
                     readonly 
                     />
                  <div class="frame-div edit-input">
                     <img class="edit-icon" alt="" src="{{ asset('assets/frontend/img/edit-3.svg') }}" />
                  </div>
               </div>
            </div>
            <div class="field5">
               <div class="unit5">Retype Password</div>
               <div class="rectangle-parent3">
                  <div class="frame-child4"></div>
                  <input name = "password_confirmation" class="input" placeholder="********" type="password" readonly  />
                  <div class="edit-wrapper1 edit-input">
                     <img class="edit-icon" alt="" src="{{ asset('assets/frontend/img/edit-4.svg') }}" />
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
               <a href="{{ route('frontend.member.help-center') }}">
                  <div class="contact-us-label">
                     <img
                        class="support-help-questionheadph"
                        loading="lazy"
                        alt=""
                        src="{{ asset('assets/frontend/img/support-help-questionheadphones-customer-support.svg') }}"
                        />
                     <div class="help-center">Help Center</div>
                  </div>
               </a>
               <a href="{{ route('frontend.member.contact-us.index') }}">
                  <div class="contact-us-label1">
                     <img
                        class="phonesphone-call-icon"
                        loading="lazy"
                        alt=""
                        src="{{ asset('assets/frontend/img/phonesphone-call.svg') }}"
                        />
                     <div class="contact-us">Contact Us</div>
                  </div>
               </a>
            </div>
         </div>
      </x-forms.patch>
   </div>
</section>
<div class="profile-child"></div>
@endsection
@push('after-scripts')
<script type="text/javascript">
   $(document).on('click', '.edit-input', function(){
     var inputField = $(this).siblings('input');
     if (inputField.prop('readonly')) {
         inputField.prop('readonly', false).focus();
     } else {
         inputField.prop('readonly', true);
     }
   })
</script>
@endpush