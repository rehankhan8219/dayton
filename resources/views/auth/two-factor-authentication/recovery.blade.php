@extends($directory . '.layouts.auth')

@section('title', __('Two Factor Recovery Codes'))
@section('page-title', __('Two Factor Recovery Codes'))
@section('page-description', __('Save these codes at safe place!'))

@section('form')
    <h5>@lang('Save your two factor recovery codes:')</h5>

    <p>@lang('Recovery codes are used to access your account in the event you no longer have access to your authenticator app.')</p>

    <p class="text-danger"><strong>@lang('Save these codes! If you lose your device and don\'t have the recovery codes you will lose access to your account forever!')</strong></p>

    <x-forms.patch :action="route($redirectBase.'.auth.account.2fa.update')" name="confirm-item">
        <button class="btn btn-sm btn-block btn-danger mb-3" type="submit">@lang('Generate New Backup Codes')</button>
    </x-forms.patch>

    <p><strong>@lang('Each code can only be used once!')</strong></p>

    <div class="row">
        @foreach (collect($recoveryCodes)->chunk(5) as $codes)
            <div class="col-6">
                <ul>
                    @foreach ($codes as $code)
                        <li>
                            {{ $code['code'] }} -

                            @if ($code['used_at'])
                                <strong class="text-danger">
                                    @lang('Used'): @displayDate(carbon($code['used_at']))
                                </strong>
                            @else
                                <em>@lang('Not Used')</em>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
            <!--col-->
        @endforeach
    </div>
    <!--row-->

    <a href="{{ route(homeRoute()) }}" class="btn btn-sm btn-block btn-success">@lang('I have stored these codes in a safe place')</a>
@endsection
