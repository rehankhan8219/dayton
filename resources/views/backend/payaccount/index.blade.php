@extends('backend.layouts.app')

@section('title', __('Pay Now Account Management'))
@section('page-title', __('Pay Now Account Management'))

@section('content')
<x-backend.card>
    <x-slot name="body">
        <div class="row mb-3">
            <div class="col-6">
                <h4 class="card-title">@lang('List of All Pay Now Accounts')</h4>
            </div>
            <div class="col-6 text-end">
                <x-utils.link :href="route('admin.payaccount.create')" class="btn btn-outline-primary btn-sm waves-effect waves-light" icon="fa fa-plus" text="Add New Pay Account" />
            </div>
        </div>
        <livewire:backend.pay-accounts-table />
    </x-slot>
</x-backend.card>
@endsection