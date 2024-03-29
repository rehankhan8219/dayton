@extends('frontend.layouts.app')

@section('title', __('Career'))
@section('page_name', 'product')

@push('after-styles')
    <link href="{{asset('assets/frontend/css/product.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('content')

<section class="product-child"></section>
   <div class="product-item"></div>
   
   <section class="ellipse-parent">
     <div class="frame-inner"></div>
     <div class="currency-pair-label-wrapper">
       <div class="currency-pair-label">
         <div class="f-o-r-e-x-p-a-i-r-s-l-a-b-e-l-parent">
           <div class="f-o-r-e-x-p-a-i-r-s-l-a-b-e-l">
             <h2 class="forex-pairs">{!! $career_secton_1->subtitle !!}</h2>
           </div>
           <div class="a-forex-pair">
              {!! $career_secton_1->script !!}
           </div>
         </div>
         <div class="currency-pair-label-inner">
           <div class="rectangle-group">
             <div class="rectangle-div"></div>
             <!-- <div class="image-will-be">Image will be uploaded to here</div> -->
             <div class="image-will-be">
               <img class="img-fluid" src="{{ Storage::url($career_secton_1->image) }}" height="500" width="650">
             </div>
           </div>
         </div>
       </div>
     </div>
   </section>

@endsection
@push('after-scripts')
    <script>
    </script>
@endpush
