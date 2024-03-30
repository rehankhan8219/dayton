@extends('backend.layouts.app')

@section('title', __('Bill Management'))
@section('page-title', __('Bill Management'))

@section('content')
<x-backend.card>
    <x-slot name="body">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#input" role="tab" aria-selected="true">
                    <span class="d-block d-sm-none"><i class="bx bx-user-circle"></i></span>
                    <span class="d-none d-sm-block">@lang('Input')</span>    
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#summary" role="tab" aria-selected="false">
                    <span class="d-block d-sm-none"><i class="bx bx-user-circle"></i></span>
                    <span class="d-none d-sm-block">@lang('Summary')</span>    
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#history" role="tab" aria-selected="false">
                    <span class="d-block d-sm-none"><i class="bx bx-user-circle"></i></span>
                    <span class="d-none d-sm-block">@lang('History')</span>    
                </a>
            </li>
        </ul>
        <div class="tab-content p-3 text-muted">
            <div class="tab-pane active" id="input" role="tabpanel">
                <div class="row mb-3">
                    <div class="col-6">
                        <h4 class="card-title">@lang('List of All Bills')</h4>
                    </div>
                    <div class="col-6 text-end">
                        <x-utils.link :href="route('admin.bill.create')" class="btn btn-outline-primary btn-sm waves-effect waves-light" icon="fa fa-plus" text="Add New Bill" />
                    </div>
                </div>
                <livewire:backend.bills-table />
            </div>
            <div class="tab-pane" id="summary" role="tabpanel">
                <div class="row mb-3">
                    <div class="col-12">
                        <h4 class="card-title">@lang('List of Unpaid/Processing Bills')</h4>
                    </div>
                </div>
                <livewire:backend.bill-summaries-table />
            </div>
            <div class="tab-pane" id="history" role="tabpanel">
                <div class="row mb-3">
                    <div class="col-12">
                        <h4 class="card-title">@lang('List of History Bills')</h4>
                    </div>
                </div>
                <livewire:backend.bill-history-table />
            </div>
        </div>
    </x-slot>
</x-backend.card>
@endsection