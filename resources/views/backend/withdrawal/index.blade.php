@extends('backend.layouts.app')

@section('title', __('Withdrawal Management'))
@section('page-title', __('Withdrawal Management'))

@section('content')
<x-backend.card>
    <x-slot name="body">
        <div class="row mb-3">
            <div class="col-6">
                <h4 class="card-title">@lang('List of All Withdrawal Requests')</h4>
            </div>
        </div>
        <livewire:backend.withdrawals-table />
    </x-slot>
</x-backend.card>
@endsection