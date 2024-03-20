@inject('model', '\App\Models\User')
@extends('backend.layouts.app')

@section('title', __('User Management'))
@section('page-title', __('User Management'))

@section('content')
<x-backend.card>
    <x-slot name="body">
        <div class="row">
            <div class="col-6">
                <h4 class="card-title">@lang('Add a New User')</h4>
                <p class="card-description">Fields marked with <span class="text-danger">*</span> are mendatory.</p>
            </div>
            <div class="col-6 text-end">
                <x-utils.link :href="route('admin.user.index')" class="btn btn-outline-primary btn-sm waves-effect waves-light" icon="fa fa-arrow-left" text="Cancel" />
            </div>
        </div>
        <x-forms.post :action="route('admin.user.store')">
            <x-backend.card>
                <x-slot name="body">
                    <div x-data="{userType : '{{ $model::TYPE_ADMIN }}'}">
                        <div class="form-group row d-none">
                            <label for="name" class="col-md-2 col-form-label">@lang('Type')</label>
    
                            <div class="col-md-10">
                                <select name="type" class="form-control" required x-on:change="userType = $event.target.value">
                                    <option value="{{ $model::TYPE_USER }}">@lang('User')</option>
                                    <option value="{{ $model::TYPE_ADMIN }}" selected>@lang('Administrator')</option>
                                </select>
                            </div>
                        </div><!--form-group-->
    
                        {{-- <div class="mb-3">
                            {{ html()->label(__('Name').'<span class="text-danger">*</span>')->for('name') }}
                            {{ html()->text('name')
                                ->class('form-control')
                                ->placeholder(__('Name'))
                                ->maxlength(100)
                                ->required()
                                ->autofocus() }}
                        </div><!--form-group--> --}}
    
                        <div class="row mb-3">
                            {{-- <div class="col-sm-12 col-md-6">
                                {{ html()->label(__('E-mail Address').'<span class="text-danger">*</span>')->for('email') }}
                                {{ html()->email('email')
                                    ->class('form-control')
                                    ->placeholder(__('E-mail Address'))
                                    ->maxlength(100)
                                    ->required() }}
                            </div> --}}
                            {{-- <div class="col-sm-12 col-md-6">
                                {{ html()->label(__('Phone No'))->for('phone') }}
                                {{ html()->text('phone')
                                    ->class('form-control')
                                    ->placeholder(__('Phone No'))
                                    ->maxlength(100) }}
                            </div> --}}
                            <div class="col-sm-12 col-md-6">
                                {{ html()->label(__('User ID').'<span class="text-danger">*</span>')->for('username') }}
                                {{ html()->text('username')
                                    ->class('form-control')
                                    ->placeholder(__('User ID'))
                                    ->maxlength(100)
                                    ->required() }}
                            </div>
                        </div><!--form-group-->
                        
                        <div class="row mb-3">
                            <div class="col-sm-12 col-md-6">
                                {{ html()->label(__('Password').'<span class="text-danger">*</span>')->for('password') }}
                                {{ html()->password('password')
                                    ->class('form-control')
                                    ->placeholder(__('Password'))
                                    ->maxlength(100)
                                    ->required() }}
                            </div>
                            {{-- <div class="col-sm-12 col-md-6">
                                {{ html()->label(__('Confirm Password').'<span class="text-danger">*</span>')->for('password_confirmation') }}
                                {{ html()->password('password_confirmation')
                                    ->class('form-control')
                                    ->placeholder(__('Confirm Password'))
                                    ->maxlength(100)
                                    ->required() }}
                            </div> --}}
                        </div><!--form-group-->
    
                        {{-- <div class="form-group row">
                            <label for="active" class="col-md-2 col-form-label">@lang('Active')</label>
    
                            <div class="col-md-10">
                                <div class="form-check">
                                    <input name="active" id="active" class="form-check-input" type="checkbox" value="1" {{ old('active', true) ? 'checked' : '' }} />
                                </div><!--form-check-->
                            </div>
                        </div><!--form-group-->
    
                        <div x-data="{ emailVerified : false }">
                            <div class="form-group row">
                                <label for="email_verified" class="col-md-2 col-form-label">@lang('E-mail Verified')</label>
    
                                <div class="col-md-10">
                                    <div class="form-check">
                                        <input
                                            type="checkbox"
                                            name="email_verified"
                                            id="email_verified"
                                            value="1"
                                            class="form-check-input"
                                            x-on:click="emailVerified = !emailVerified"
                                            {{ old('email_verified') ? 'checked' : '' }} />
                                    </div><!--form-check-->
                                </div>
                            </div><!--form-group-->
    
                            <div x-show="!emailVerified">
                                <div class="form-group row">
                                    <label for="send_confirmation_email" class="col-md-2 col-form-label">@lang('Send Confirmation E-mail')</label>
    
                                    <div class="col-md-10">
                                        <div class="form-check">
                                            <input
                                                type="checkbox"
                                                name="send_confirmation_email"
                                                id="send_confirmation_email"
                                                value="1"
                                                class="form-check-input"
                                                {{ old('send_confirmation_email') ? 'checked' : '' }} />
                                        </div><!--form-check-->
                                    </div>
                                </div><!--form-group-->
                            </div>
                        </div> --}}
    
                        {{-- @include('backend.user.includes.roles') --}}
    
                        @if (!config('boilerplate.access.user.only_roles'))
                            @include('backend.user.includes.permissions')
                        @endif
                    </div>
                </x-slot>
    
                <x-slot name="footer">
                    <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create User')</button>
                </x-slot>
            </x-backend.card>
        </x-forms.post>
    </x-slot>
</x-backend.card>
@endsection