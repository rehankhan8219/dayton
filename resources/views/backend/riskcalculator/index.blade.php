@extends('backend.layouts.app')

@section('title', __('Risk Calculator Management'))
@section('page-title', __('Risk Calculator Management'))

@section('content')
<x-backend.card>
    <x-slot name="body">
        <div class="row mb-3">
            <div class="col-6">
                <h4 class="card-title">@lang('List of All Risk Calculators')</h4>
            </div>
            <div class="col-6 text-end">
                <x-utils.link :href="route('admin.riskcalculator.create')" class="btn btn-outline-primary btn-sm waves-effect waves-light" icon="fa fa-plus" text="Add New Risk Calculator" />
            </div>
        </div>
        <livewire:backend.risk-calculators-table />
    </x-slot>
</x-backend.card>
@endsection