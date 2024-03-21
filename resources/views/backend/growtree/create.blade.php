@extends('backend.layouts.app')

@section('title', __('Create Grow Tree'))
@section('page-title', __('Create Grow Tree'))

@section('content')
    
    <x-backend.card>
        <x-slot name="body">
            <div x-data="{ user_id : false }">
                <div class="row mb-3">
                    <div class="col-6">
                        <h4 class="card-title">@lang('Add a New Grow Tree')</h4>
                        <p class="card-description">Fields marked with <span class="text-danger">*</span> are mendatory.</p>
                    </div>
                    <div class="col-6 text-end">
                        <x-utils.link class="btn btn-outline-primary btn-sm waves-effect waves-light" icon="fas fa-arrow-left" :href="route('admin.growtree.index')" :text="__('Cancel')" />
                    </div>
                </div>
                <x-forms.post :action="route('admin.level.store')">
                    <div class="form-group row mb-3">
                        {{ html()->label(__('New Level').'<span class="text-danger">*</span>')->class('col-md-1 col-form-label')->for('name') }}
    
                        <div class="col-md-5">
                            {{ html()->text('name')
                                ->class('form-control')
                                ->placeholder(__('New Level'))
                                ->required() }}
                        </div>
                        <div class="col-md-5">
                            <button class="btn btn-sm btn-primary float-left" type="submit">@lang('Add New Level')</button>
                        </div>
                    </div><!--form-group-->
                </x-forms.post>
                <x-forms.post :action="route('admin.growtree.store')" enctype="multipart/form-data">
                    <div class="form-group row mb-3">
                        {{ html()->label(__('DT Code').'<span class="text-danger">*</span>')->class('col-md-1 col-form-label')->for('user_id') }}
    
                        <div class="col-md-5">
                            {{ html()->select('user_id', $users->pluck('dt_code', 'id'))
                                ->class('form-control')
                                ->placeholder(__('Select DT Code'))
                                ->attribute('x-on:change', 'user_id = $event.target.value')
                                ->required()
                                ->autofocus() }}
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row mb-3">
                        {{ html()->label(__('Name'))->class('col-md-1 col-form-label')->for('name') }}
    
                        <div class="col-md-5 col-form-label">
                            <span id="username"></span>
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row mb-3">
                        {{ html()->label(__('Level'))->class('col-md-1 col-form-label')->for('level_id') }}
    
                        <div class="col-md-5">
                            {{ html()->select('level_id', $levels->pluck('name', 'id'))
                                ->class('form-control')
                                ->placeholder(__('Select Level'))
                                ->required() }}
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row mb-3">
                        {{ html()->label(__('Diagram'))->class('col-md-1 col-form-label')->for('diagram') }}
                        <div class="col-md-5 d-flex">
                            {{ html()->file('diagram')
                                ->class('form-control')
                                ->attribute('accept', 'jpg,png,jpeg')
                                ->required() }}
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row mb-3">
                        {{ html()->label('')->class('col-md-1 col-form-label') }}
                        <button class="col-md-2 btn btn-sm btn-primary float-right" type="submit">@lang('Create Grow Tree')</button>
                    </div>
                </x-forms.post>
            </div>
        </x-slot>
    </x-backend.card>
    
@endsection
@push('after-scripts')
    <script>
        $(document).ready(function(){
            var brokerId = '{{old('broker_id')}}';
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