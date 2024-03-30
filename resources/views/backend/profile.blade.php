@extends('backend.layouts.app')

@section('title', __('Update Profile'))
@section('page-title', __('Update Profile'))

@section('content')
    <x-forms.patch :action="route('admin.profile.update')">
        @php(html()->modelForm($logged_in_user))
        <x-backend.card>
            <x-slot name="body">
                <div class="row mb-3">
                    <div class="col-6">
                        <h4 class="card-title">@lang('Update Profile')</h4>
                        <p class="card-description">Fields marked with <span class="text-danger">*</span> are mendatory.
                        </p>
                    </div>
                    <div class="col-6 text-end">
                        <x-utils.link class="btn btn-outline-primary btn-sm waves-effect waves-light"
                            icon="fas fa-arrow-left" :href="route('admin.dashboard')" :text="__('Cancel')" />
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    {{ html()->label(__('User ID').'<span class="text-danger">*</span>')->for('username') }}
                    {{ html()->text('username')
                        ->class('form-control')
                        ->placeholder(__('User ID'))
                        ->maxlength(100)
                        ->required() }}
                </div>
                <div class="col-sm-12 col-md-6">
                    {{ html()->label(__('Password'))->for('password') }}
                    {{ html()->password('password')
                        ->class('form-control')
                        ->placeholder(__('Password'))
                        ->maxlength(100) }}
                    <span class="text-info">
                        <i class="fa fa-info-circle"></i>
                        @lang('Leave empty to retain original password.')
                    </span>
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Profile')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection