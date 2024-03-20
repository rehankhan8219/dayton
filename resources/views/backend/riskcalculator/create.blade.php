@extends('backend.layouts.app')

@section('title', __('Risk Calculator Management'))
@section('page-title', __('Risk Calculator Management'))

@section('content')
<x-backend.card>
    <x-slot name="body">
        <div class="row">
            <div class="col-6">
                <h4 class="card-title">@lang('Add a New Risk Calculator')</h4>
                <p class="card-description">Fields marked with <span class="text-danger">*</span> are mendatory.</p>
            </div>
            <div class="col-6 text-end">
                <x-utils.link :href="route('admin.riskcalculator.index')" class="btn btn-outline-primary btn-sm waves-effect waves-light" icon="fa fa-arrow-left" text="Cancel" />
            </div>
        </div>
        <x-forms.post :action="route('admin.riskcalculator.store')">
            <x-backend.card>
                <x-slot name="body">
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-6">
                            {{ html()->label(__('Pairs').'<span class="text-danger">*</span>')->for('pairs') }}
                            {{ html()->text('pairs')
                                ->class('form-control')
                                ->placeholder(__('Pairs'))
                                ->maxlength(100)
                                ->required() }}
                        </div>
                    </div><!--form-group-->
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-6">
                            {{ html()->label(__('Risk Level').'<span class="text-danger">*</span>')->for('risk_level') }}
                            {{ html()->text('risk_level')
                                ->class('form-control')
                                ->placeholder(__('Risk Level'))
                                ->maxlength(100)
                                ->required() }}
                        </div>
                    </div><!--form-group-->
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-6">
                            {{ html()->label(__('Lot').'<span class="text-danger">*</span>')->for('lot') }}
                            {{ html()->text('lot')
                                ->class('form-control')
                                ->placeholder(__('Lot'))
                                ->required() }}
                        </div>
                    </div><!--form-group-->
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-6">
                            {{ html()->label(__('Balance').'<span class="text-danger">*</span>')->for('balance') }}
                            {{ html()->number('balance')
                                ->class('form-control')
                                ->placeholder(__('Balance'))
                                ->required() }}
                        </div>
                    </div><!--form-group-->
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-6">
                            {{ html()->label(__('Explanation').'<span class="text-danger">*</span>')->for('explanation') }}
                            {{ html()->textarea('explanation')
                                ->class('form-control')
                                ->placeholder(__('Explanation'))
                                ->rows(6)
                                ->required() }}
                        </div>
                    </div><!--form-group-->
                </x-slot>
    
                <x-slot name="footer">
                    <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create Risk Calculator')</button>
                </x-slot>
            </x-backend.card>
        </x-forms.post>
    </x-slot>
</x-backend.card>
@endsection