{{-- @extends('app_settings::layout') --}}
@extends('backend.layouts.app')

@section('title', __('Settings'))
@section('page-title', __('Settings'))

@push('after-styles')
    <style>
        label {
            margin-bottom: 0;
        }

        input.form-control {
            margin-bottom: 10px;
        }
    </style>
@endpush
@section('content')
    @include('app_settings::_settings')
@endsection
