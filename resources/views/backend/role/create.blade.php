@inject('model', '\App\Models\User')

@extends('backend.layouts.app')

@section('title', __('Create Role'))
@section('page-title', __('Create Role'))

@section('content')
    <x-forms.post :action="route('admin.role.store')">
        <x-backend.card>
            <x-slot name="body">
                <div class="row mb-3">
                    <div class="col-6">
                        <h4 class="card-title">@lang('Add a New Role')</h4>
                        <p class="card-description">Fields marked with <span class="text-danger">*</span> are mendatory.</p>
                    </div>
                    <div class="col-6 text-end">
                        <x-utils.link class="btn btn-outline-primary btn-sm waves-effect waves-light" icon="fas fa-arrow-left" :href="route('admin.role.index')" :text="__('Cancel')" />
                    </div>
                </div>
                <div x-data="{userType : '{{ $model::TYPE_USER }}'}">
                    <div class="form-group row mb-3">
                        <label for="name" class="col-md-2 col-form-label">@lang('Type')</label>

                        <div class="col-md-10">
                            <select name="type" class="form-control" required x-on:change="userType = $event.target.value">
                                <option value="{{ $model::TYPE_USER }}">@lang('User')</option>
                                <option value="{{ $model::TYPE_ADMIN }}">@lang('Administrator')</option>
                            </select>
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row mb-3">
                        <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>

                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') }}" maxlength="100" required />
                        </div>
                    </div>

                    @include('backend.user.includes.permissions')
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create Role')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
