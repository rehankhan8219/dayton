@extends('backend.layouts.app')

@section('title', __('Help Center Management'))
@section('page-title', __('Help Center Management'))

@section('content')
<x-backend.card>
    <x-slot name="body">
        <div class="row mb-3">
            <div class="col-6">
                <h4 class="card-title">@lang('List of All Help Centers')</h4>
            </div>
            <div class="col-6 text-end">
                <x-utils.link :href="route('admin.helpcenter.create')" class="btn btn-outline-primary btn-sm waves-effect waves-light" icon="fa fa-plus" text="Add New Help Center" />
            </div>
        </div>
        <livewire:backend.help-centers-table />
    </x-slot>
</x-backend.card>
@endsection