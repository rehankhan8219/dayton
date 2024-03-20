@extends('backend.layouts.app')

@section('title', __('Commission Management'))
@section('page-title', __('Commission Management'))

@section('content')
<x-backend.card>
    <x-slot name="body">
        <div class="row mb-3">
            <div class="col-6">
                <h4 class="card-title">@lang('List of All Commissions')</h4>
            </div>
            <div class="col-6 text-end">
                <x-utils.link :href="route('admin.commission.create')" class="btn btn-outline-primary btn-sm waves-effect waves-light" icon="fa fa-plus" text="Add New Commission" />
            </div>
        </div>
        <livewire:backend.commissions-table />
    </x-slot>
</x-backend.card>
@endsection