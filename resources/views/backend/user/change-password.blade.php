@inject('model', '\App\Models\User')
@extends('backend.layouts.app')

@section('title', __('User Management'))
@section('page-title', __('User Management'))

@section('content')
<x-backend.card>
    <x-slot name="body">
        <div class="row">
            <div class="col-6">
                <h4 class="card-title">@lang('Change Password for :name', ['name' => $user->name])</h4>
                <p class="card-description">Fields marked with <span class="text-danger">*</span> are mendatory.</p>
            </div>
            <div class="col-6 text-end">
                <x-utils.link :href="route('admin.user.index')" class="btn btn-outline-primary btn-sm waves-effect waves-light" icon="fa fa-arrow-left" text="Cancel" />
            </div>
        </div>
        <x-forms.patch :action="route('admin.user.change-password.update', $user)">
            @php(html()->model($user))
            <x-backend.card>
                <x-slot name="body">
                    <div class="row mb-3">
                            <div class="col-sm-12 col-md-6">
                                {{ html()->label(__('Password').'<span class="text-danger">*</span>')->for('password') }}
                                {{ html()->password('password')
                                    ->class('form-control')
                                    ->placeholder(__('Password'))
                                    ->maxlength(100)
                                    ->required()
                                    ->autofocus() }}
                            </div>
                            <div class="col-sm-12 col-md-6">
                                {{ html()->label(__('Confirm Password').'<span class="text-danger">*</span>')->for('password_confirmation') }}
                                {{ html()->password('password_confirmation')
                                    ->class('form-control')
                                    ->placeholder(__('Confirm Password'))
                                    ->maxlength(100)
                                    ->required() }}
                            </div>
                        </div><!--form-group-->
                    </div>
                </x-slot>
    
                <x-slot name="footer">
                    <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update User Password')</button>
                </x-slot>
            </x-backend.card>
        </x-forms.patch>
    </x-slot>
</x-backend.card>
@endsection