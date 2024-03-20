@extends('backend.layouts.app')

@section('title', __('Member Management'))
@section('page-title', __('Member Management'))

@section('content')
<x-backend.card>
    <x-slot name="body">
        <div class="row mb-3">
            <div class="col-6">
                <h4 class="card-title">@lang('List of All Members')</h4>
            </div>
        </div>
        <livewire:backend.members-table />
    </x-slot>
</x-backend.card>

@if (request()->query('dt_code'))
    <x-backend.card>
        <x-slot name="body">
            <div class="row mb-3">
                <div class="col-6">
                    <h4 class="card-title">@lang('List of All Brokers')</h4>
                </div>
                <div class="col-6 d-flex">
                    @php($member = app()->make('\App\Models\User')->where('dt_code', request()->query('dt_code'))->first())
                    <h6 class="">DT Code: {{ $member->dt_code }}</h6>
                    <h6 class=" ms-3">Name: {{ $member->name }}</h6>
                </div>
            </div>
            <livewire:backend.brokers-table dtCode="{{request()->query('dt_code')}}" />
        </x-slot>
    </x-backend.card>
@endif
@endsection