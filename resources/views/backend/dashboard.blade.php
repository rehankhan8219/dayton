@extends('backend.layouts.app')

@section('title', __('Dashboard'))
@section('page-title', __('Dashboard'))

@section('content')
<x-backend.card>
    <x-slot name="body">
        <h4 class="card-title">@lang('Welcome back!')</h4>
        <p class="card-title-desc">
            @lang('Welcome back, ') {{$logged_in_user->name}}
        </p>
    </x-slot>
</x-backend.card>
@endsection