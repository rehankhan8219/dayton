@extends('backend.layouts.app')

@section('title', __('Update Help Center'))

@section('content')
    <x-backend.card>
        <x-slot name="body">
            <div x-data="{ user_id : false }">
                <div class="row mb-3">
                    <div class="col-6">
                        <h4 class="card-title">@lang('Edit a Help Center')</h4>
                        <p class="card-description">Fields marked with <span class="text-danger">*</span> are mendatory.</p>
                    </div>
                    <div class="col-6 text-end">
                        <x-utils.link class="btn btn-outline-primary btn-sm waves-effect waves-light" icon="fas fa-arrow-left" :href="route('admin.helpcenter.index')" :text="__('Cancel')" />
                    </div>
                </div>
                <x-forms.post :action="route('admin.helpcategory.store')">
                    <div class="form-group row mb-3">
                        {{ html()->label(__('New Category').'<span class="text-danger">*</span>')->class('col-md-2 col-form-label')->for('name') }}
    
                        <div class="col-md-5">
                            {{ html()->text('name')
                                ->class('form-control')
                                ->placeholder(__('New Category'))
                                ->required() }}
                        </div>
                        <div class="col-md-5">
                            <button class="btn btn-sm btn-primary float-left" type="submit">@lang('Add New Category')</button>
                        </div>
                    </div><!--form-group-->
                </x-forms.post>
                <x-forms.patch :action="route('admin.helpcenter.update', $helpCenter)">
                    @php(html()->model($helpCenter))
                    <div class="form-group row mb-3">
                        {{ html()->label(__('Helpcategory'))->class('col-md-2 col-form-label')->for('help_category_id') }}
    
                        <div class="col-md-5">
                            {{ html()->select('help_category_id', $helpCategories->pluck('name', 'id'))
                                ->class('form-control')
                                ->placeholder(__('Select Help Category'))
                                ->required()
                                ->autofocus() }}
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row mb-3">
                        {{ html()->label(__('Title'))->class('col-md-2 col-form-label')->for('title') }}
                        <div class="col-md-5 d-flex">
                            {{ html()->text('title')
                                ->class('form-control')
                                ->placeholder(__('Title'))
                                ->required() }}
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row mb-3">
                        {{ html()->label(__('Explanation'))->class('col-md-2 col-form-label')->for('explanation') }}
                        <div class="col-md-5 d-flex">
                            {{ html()->textarea('explanation')
                                ->class('form-control')
                                ->placeholder(__('Explanation'))
                                ->rows(4)
                                ->required() }}
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row mb-3">
                        {{ html()->label('')->class('col-md-2 col-form-label') }}
                        <button class="col-md-2 btn btn-sm btn-primary float-right" type="submit">@lang('Update Help Center')</button>
                    </div>
                </x-forms.patch>
            </div>
        </x-slot>
    </x-backend.card>
@endsection
@push('after-scripts')
    <script>
        $(document).ready(function(){
            $('#user_id').change(function(){
                $('#broker_id option:not(:first)').remove();
                if($('#user_id').val()) {
                    $.ajax({
                        url: '{{route('admin.member.broker.fetch', '##MEMBER_ID##')}}'.replace('##MEMBER_ID##', $('#user_id').val()),
                        dataType: 'json',
                        success: function(response) {
                            if(response.success) {
                                $('#username').html(response.name);
                            }
                        }
                    })
                }
            }).trigger('change')
        });
    </script>
@endpush
