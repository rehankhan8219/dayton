@inject('model', '\App\Models\User')
@extends('backend.layouts.app')

@section('title', __('Member Management'))
@section('page-title', __('Member Management'))

@section('content')
<x-backend.card>
    <x-slot name="body">
        <div class="row">
            <div class="col-6">
                <h4 class="card-title">@lang('Edit a Member')</h4>
                <p class="card-description">Fields marked with <span class="text-danger">*</span> are mendatory.</p>
            </div>
            <div class="col-6 text-end">
                <x-utils.link :href="route('admin.member.index')" class="btn btn-outline-primary btn-sm waves-effect waves-light" icon="fa fa-arrow-left" text="Cancel" />
            </div>
        </div>
        <x-forms.patch :action="route('admin.member.update', $member)">
            @php(html()->model($member))
            <x-backend.card>
                <x-slot name="body">
                    <div x-data="{memberType : '{{ $model::TYPE_USER }}'}">
                        <div class="form-group row d-none">
                            <label for="name" class="col-md-2 col-form-label">@lang('Type')</label>
    
                            <div class="col-md-10">
                                <select name="type" class="form-control" required x-on:change="memberType = $event.target.value">
                                    <option value="{{ $model::TYPE_USER }}">@lang('Member')</option>
                                    <option value="{{ $model::TYPE_ADMIN }}" selected>@lang('Administrator')</option>
                                </select>
                            </div>
                        </div><!--form-group-->
                        
                        <div class="row mb-3">
                            <div class="col-sm-12 col-md-6">
                                {{ html()->label(__('DT Code').'<span class="text-danger">*</span>')->for('dt_code') }}
                                {{ html()->text('dt_code')
                                    ->class('form-control')
                                    ->placeholder(__('DT Code'))
                                    ->maxlength(100)
                                    ->required()
                                    ->autofocus() }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12 col-md-6">
                                {{ html()->label(__('Name').'<span class="text-danger">*</span>')->for('name') }}
                                {{ html()->text('name')
                                    ->class('form-control')
                                    ->placeholder(__('Name'))
                                    ->maxlength(100)
                                    ->required() }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12 col-md-6">
                                {{ html()->label(__('Email').'<span class="text-danger">*</span>')->for('email') }}
                                {{ html()->text('email')
                                    ->class('form-control')
                                    ->placeholder(__('E-mail Address'))
                                    ->maxlength(100)
                                    ->required() }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12 col-md-6">
                                {{ html()->label(__('Phone No').'<span class="text-danger">*</span>')->for('phone') }}
                                {{ html()->text('phone')
                                    ->class('form-control')
                                    ->placeholder(__('Phone No'))
                                    ->maxlength(100) }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12 col-md-6">
                                {{ html()->label(__('Country').'<span class="text-danger">*</span>')->for('country') }}
                                {{ html()->text('country')
                                    ->class('form-control')
                                    ->placeholder(__('Country'))
                                    ->maxlength(100)
                                    ->required() }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12 col-md-6">
                                {{ html()->label(__('Password').'<span class="text-danger">*</span>')->for('password_alt') }}
                                {{ html()->text('password_alt')
                                    ->class('form-control')
                                    ->placeholder(__('Password'))
                                    ->maxlength(100)
                                    ->required() }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12 col-md-6">
                                {{ html()->label(__('Upline'))->for('upline') }}
                                {{ html()->text('upline')
                                    ->class('form-control')
                                    ->placeholder(__('Upline'))
                                    ->maxlength(100) }}
                            </div>
                        </div>
                        @if (! $member->isMasterAdmin())
                            {{-- @include('backend.member.includes.roles') --}}
        
                            @if (!config('boilerplate.access.member.only_roles'))
                                @include('backend.member.includes.permissions')
                            @endif
                        @endif
                    </div>
                </x-slot>
    
                <x-slot name="footer">
                    <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Member')</button>
                </x-slot>
            </x-backend.card>
        </x-forms.patch>
    </x-slot>
</x-backend.card>
@endsection