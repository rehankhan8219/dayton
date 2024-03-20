@extends($directory.'.layouts.auth')

@section('title', __('Enable 2FA'))
@section('page-title', __('Enable 2FA'))
@section('page-description', __('Enable 2FA and continue using the app'))

@section('form')
<div class="row">
    <div class="col-sm-12">
        <h5><strong>@lang('Step 1: Configure your 2FA app')</strong></h5>

        <p>@lang('To enable 2FA, you\'ll need a 2FA authenticator app on your phone. Examples include: Google Authenticator, FreeOTP, Authy, andOTP, and Microsoft Authenticator (Just to name a few).')</p>

        <p>@lang('Most applications will let you set up by scanning the QR code from within the app. If you prefer, you may type the key below the QR code in manually.')</p>
    </div><!--col-->

    <div class="col-sm-12">
        <div class="text-center">
            {!! $qrCode !!}

            <p><i class="fa fa-key"> {{ $secret }}</i></p>
        </div>
    </div><!--col-->
</div><!--row-->

<hr/>

<h5><strong>@lang('Step 2: Enter a 2FA code')</strong></h5>

<p>@lang('Generate a code from your 2FA app and enter it below:')</p>

<livewire:auth.two-factor-authentication />
@endsection
