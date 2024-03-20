@extends('backend.layouts.app')

@section('title', __('Broker Management'))
@section('page-title', __('Broker Management'))

@section('content')
<x-backend.card>
    <x-slot name="body">
        <div class="row mb-3">
            <div class="col-6">
                <h4 class="card-title">@lang('List of All Brokers')</h4>
            </div>
        </div>
        {{-- <livewire:backend.brokers-table /> --}}
    </x-slot>
</x-backend.card>
@endsection