@extends('backend.layouts.app')

@section('title', __('Blog Management'))
@section('page-title', __('Blog Management'))

@section('content')
<x-backend.card>
    <x-slot name="body">
        <div class="row">
            <div class="col-6">
                <h4 class="card-title">@lang('Update Blog Details')</h4>
                <p class="card-description">Fields marked with <span class="text-danger">*</span> are mendatory.</p>
            </div>
            <div class="col-6 text-end">
                <x-utils.link :href="route('admin.blog.index')" class="btn btn-outline-primary btn-sm waves-effect waves-light" icon="fa fa-arrow-left" text="Cancel" />
            </div>
        </div>
        @foreach ($blogs as $blog)
            <x-forms.patch :action="route('admin.blog.update', $blog)" id="blog-form" enctype="multipart/form-data">
                @php
                    html()->model($blog);
                @endphp
                <x-backend.card>
                    <x-slot name="body">
                        <h4 class="card-title">{{$blog->name}}</h4>
                        <hr/>
                        <div class="row mb-3">
                            <div class="col-sm-12 col-md-6">
                                {{ html()->label(__('Subtitle').'<span class="text-danger">*</span>')->for('subtitle') }}
                                {{ html()->textarea('subtitle')
                                    ->class('form-control')
                                    ->placeholder(__('Subtitle'))
                                    ->rows(4)
                                    ->required() }}
                            </div>
                        </div><!--form-group-->
                        @if ($blog->name == 'Home 2' || $blog->name == 'About Us 1')
                        <div class="row mb-3">
                            <div class="col-sm-12 col-md-6">
                                {{ html()->label(__('Video').'<span class="text-danger">*</span>')->for('video') }}
                                {{ html()->input('url', 'video')
                                    ->class('form-control')
                                    ->placeholder(__('Video (Youtube URL)'))
                                    ->maxlength(100)
                                    ->required() }}
                            </div>
                        </div><!--form-group-->
                        @endif
                        @if ($blog->name == 'Product' || $blog->name == 'Career')
                        <div class="row mb-3">
                            <div class="col-sm-12 col-md-6">
                                {{ html()->label(__('Image'))->for('image') }}
                                {{ html()->file('image')
                                    ->class('form-control') }}
                                @if ($blog->image_url)
                                    <img src="{{$blog->image_url}}" alt="" class="img-fluid img-responsive" style="max-width:150px;">
                                    <div class="text-info"><i class="fa fa-info-circle"></i>&nbsp; @lang('Leave empty to retain this image.')</div>
                                @endif
                            </div>
                        </div><!--form-group-->
                        @endif

                        @php $is_editor = ''; @endphp

                        @if ($blog->name == 'Home 2')
                            @php $is_editor = 'my-editor'; @endphp
                        @endif
                        <div class="row mb-3">
                            <div class="col-sm-12 col-md-6">
                                {{ html()->label(__('Script').'<span class="text-danger">*</span>')->for('script') }}
                                {{ html()->textarea('script')
                                    ->class('form-control '.$is_editor)
                                    ->placeholder(__('script'))
                                    ->rows(8)
                                    ->required() }}
                            </div>
                        </div><!--form-group-->
                    </x-slot>
        
                    <x-slot name="footer">
                        <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update')</button>
                    </x-slot>
                </x-backend.card>
                @php
                    html()->endModel();
                @endphp
            </x-forms.post>     
        @endforeach
    </x-slot>
</x-backend.card>
@endsection
@push('after-scripts')
    <script src="https://cdn.tiny.cloud/1/9fpo3zh5yizupxbw8xs5ds167oy7vji72825q5psqgduzte8/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    
    <script>
          tinymce.init({
            selector: '.my-editor',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
          });
        </script>
@endpush