@inject('model', '\App\Models\User')
@extends('backend.layouts.app')

@section('title', __('Broker Management'))
@section('page-title', __('Broker Management'))

@section('content')
<x-backend.card>
    <x-slot name="body">
        <div class="row">
            <div class="col-6">
                <h4 class="card-title">@lang('Edit a Broker')</h4>
                <p class="card-description">Fields marked with <span class="text-danger">*</span> are mendatory.</p>
            </div>
            <div class="col-6 text-end">
                <x-utils.link :href="route('admin.member.index')" class="btn btn-outline-primary btn-sm waves-effect waves-light" icon="fa fa-arrow-left" text="Cancel" />
            </div>
        </div>
        <x-forms.patch :action="route('admin.member.broker.update', [$member, $broker])">
            @php(html()->model($broker))
            <x-backend.card>
                <x-slot name="body">
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-6">
                            {{ html()->label(__('Broker ID').'<span class="text-danger">*</span>')->for('broker_id') }}
                            {{ html()->text('broker_id')
                                ->class('form-control')
                                ->placeholder(__('Broker ID'))
                                ->maxlength(100)
                                ->required()
                                ->autofocus() }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-6">
                            {{ html()->label(__('Broker Server').'<span class="text-danger">*</span>')->for('broker_server') }}
                            {{ html()->text('broker_server')
                                ->class('form-control')
                                ->placeholder(__('Broker Server'))
                                ->maxlength(100)
                                ->required() }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-6">
                            {{ html()->label(__('Broker Password').'<span class="text-danger">*</span>')->for('broker_password') }}
                            {{ html()->text('broker_password')
                                ->class('form-control')
                                ->placeholder(__('Broker Password'))
                                ->maxlength(100)
                                ->required() }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-6">
                            {{ html()->label(__('Broker Pairs').'<span class="text-danger">*</span>')->for('pairs') }}
                            {{ html()->text('pairs')
                                ->class('form-control')
                                ->placeholder(__('Broker Pairs'))
                                ->maxlength(100)
                                ->required() }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-6">
                            {{ html()->label(__('Risk').'<span class="text-danger">*</span>')->for('risk') }}
                            {{ html()->select('risk_calculator_id', $risks->pluck('risk_level', 'id'))
                                ->class('form-control')
                                ->placeholder(__('Select Risk Level'))
                                ->required() }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-6">
                            {{ html()->label(__('Lot').'<span class="text-danger">*</span>')->for('lot') }}
                            {{ html()->text('lot')
                                ->class('form-control')
                                ->placeholder(__('Lot'))
                                ->maxlength(100)
                                ->required() }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-6">
                            {{ html()->label(__('EA Status').'<span class="text-danger">*</span>')->for('active') }}
                            <div class="form-check">
                                {{ html()->input('checkbox', 'active', 1)
                                    ->class('form-check-input') }}
                            </div><!--form-check-->
                        </div>
                    </div>
                </x-slot>
    
                <x-slot name="footer">
                    <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create Broker')</button>
                </x-slot>
            </x-backend.card>
        </x-forms.patch>
    </x-slot>
</x-backend.card>
@endsection