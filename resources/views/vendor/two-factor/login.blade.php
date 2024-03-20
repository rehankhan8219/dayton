@extends((request()->routeIs('admin.*')? 'backend' : 'frontend').'.layouts.auth')

@section('title', __('Two Factor Authentication'))
@section('page-title', __('Two Factor Authentication'))
@section('page-description', __('Two Factor Authentication is required to continue'))
@section('content')
    <x-forms.post class="form-horizontal">
        <div class="mb-3">
            {{ html()->label(__('2FA Code'))->class('form-label')->for($input) }}
            {{ html()->text($input)
                ->class('form-control')
                ->placeholder(__('123456'))
                ->autofocus()
                ->attribute('autocomplate', $input)
                ->minlength(6)
                ->required() }}
        </div>
        <div class="mt-3 d-grid">
            <button class="btn btn-primary waves-effect waves-light" type="submit">@lang('two-factor::messages.confirm')</button>
        </div>
    </x-forms.post>
@endsection
@section('footer')
    <x-utils.link href="javascript:history.back()" :text="__('two-factor::messages.back')" class="fw-medium text-primary" />
@endsection