@extends('backend.layouts.app')

@section('title', __('Create Pay Now Account'))
@section('page-title', __('Create Pay Now Account'))

@section('content')
    <x-forms.post :action="route('admin.payaccount.store')">
        <x-backend.card>
            <x-slot name="body">
                <div x-data="{ user_id : false }">
                    <div class="row mb-3">
                        <div class="col-6">
                            <h4 class="card-title">@lang('Add a New Pay Now Account')</h4>
                            <p class="card-description">Fields marked with <span class="text-danger">*</span> are mendatory.</p>
                        </div>
                        <div class="col-6 text-end">
                            <x-utils.link class="btn btn-outline-primary btn-sm waves-effect waves-light" icon="fas fa-arrow-left" :href="route('admin.payaccount.index')" :text="__('Cancel')" />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        {{ html()->label(__('DT Code').'<span class="text-danger">*</span>')->class('col-md-2 col-form-label')->for('user_id') }}
    
                        <div class="col-md-5">
                            {{ html()->select('from_user_id', $users->pluck('dt_code', 'id'))
                                ->class('form-control')
                                ->placeholder(__('Select From DT Code'))
                                ->required() }}
                        </div>
                        <div class="col-md-5">
                            {{ html()->select('to_user_id', $users->pluck('dt_code', 'id'))
                                ->class('form-control')
                                ->placeholder(__('Select To DT Code'))
                                ->required() }}
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row mb-3">
                        {{ html()->label(__('Bank'))->class('col-md-2 col-form-label')->for('bank') }}
    
                        <div class="col-md-5">
                            {{ html()->text('bank')
                                ->class('form-control')
                                ->placeholder(__('Enter Bank'))
                                ->required() }}
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row mb-3">
                        {{ html()->label(__('Bank Account'))->class('col-md-2 col-form-label')->for('bank_account') }}
    
                        <div class="col-md-5">
                            {{ html()->text('bank_account')
                                ->class('form-control')
                                ->placeholder(__('Enter Bank Account'))
                                ->required() }}
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row mb-3">
                        {{ html()->label(__('Bank Account Name'))->class('col-md-2 col-form-label')->for('bank_account_name') }}
    
                        <div class="col-md-5">
                            {{ html()->text('bank_account_name')
                                ->class('form-control')
                                ->placeholder(__('Enter Bank Account Name'))
                                ->required() }}
                        </div>
                    </div><!--form-group-->
                </div>
            </x-slot>
            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create Pay Account')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection