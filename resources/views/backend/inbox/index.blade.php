@extends('backend.layouts.app')

@section('title', __('Inbox Management'))
@section('page-title', __('Inbox Management'))

@section('content')
    <x-backend.card>
        <x-slot name="body">
            {{-- <div class="row mb-3">
                <div class="col-6">
                    <h4 class="card-title">@lang('List of All Inbox')</h4>
                </div>
            </div> --}}
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#database" role="tab" aria-selected="true">
                        <span class="d-block d-sm-none"><i class="bx bx-user-circle"></i></span>
                        <span class="d-none d-sm-block">@lang('Database')</span>    
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#withdrawal" role="tab" aria-selected="false">
                        <span class="d-block d-sm-none"><i class="bx bx-user-circle"></i></span>
                        <span class="d-none d-sm-block">@lang('Withdrawal')</span>    
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#helpcenter" role="tab" aria-selected="false">
                        <span class="d-block d-sm-none"><i class="bx bx-question-mark"></i></span>
                        <span class="d-none d-sm-block">@lang('Help Center')</span>    
                    </a>
                </li>
            </ul>
            <div class="tab-content p-3 text-muted">
                <div class="tab-pane active" id="database" role="tabpanel">
                    <livewire:backend.inbox-database-table />
                </div>
                <div class="tab-pane" id="withdrawal" role="tabpanel">
                    <livewire:backend.inbox-withdrawals-table />
                </div>
                <div class="tab-pane" id="helpcenter" role="tabpanel">
                    <livewire:backend.inbox-help-center-table />
                </div>
            </div>
        </x-slot>
    </x-backend.card>
@endsection
