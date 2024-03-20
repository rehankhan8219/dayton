@extends('backend.layouts.app')

@section('title', __('Grow Tree Management'))
@section('page-title', __('Grow Tree Management'))

@section('content')
<x-backend.card>
    <x-slot name="body">
        <div class="row mb-3">
            <div class="col-6">
                <h4 class="card-title">@lang('List of All Grow Trees')</h4>
            </div>
            <div class="col-6 text-end">
                <x-utils.link :href="route('admin.growtree.create')" class="btn btn-outline-primary btn-sm waves-effect waves-light" icon="fa fa-plus" text="Add New Grow Tree" />
            </div>
        </div>
        <livewire:backend.grow-trees-table />
    </x-slot>
</x-backend.card>
@endsection