<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

/**
 * Class TwoFactorAuthenticationController.
 */
class TwoFactorAuthenticationController
{
    protected $directory;
    protected $redirectBase;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->directory = $request->routeIs('admin.*') ? 'backend' : 'frontend';
        $this->redirectBase = $request->routeIs('admin.*') ? 'admin' : 'frontend';
    }

    /**
     * @param  Request  $request
     * @return mixed
     */
    public function create(Request $request)
    {
        $secret = $request->user()->createTwoFactorAuth();

        return view('auth.two-factor-authentication.enable')
            ->withQrCode($secret->toQr())
            ->withSecret($secret->toString())
            ->withDirectory($this->directory)
            ->withRedirectBase($this->redirectBase);
    }

    /**
     * @param  Request  $request
     * @return mixed
     */
    public function show(Request $request)
    {
        return view('auth.two-factor-authentication.recovery')
            ->withRecoveryCodes($request->user()->getRecoveryCodes())
            ->withDirectory($this->directory)
            ->withRedirectBase($this->redirectBase);
    }

    /**
     * @param  Request  $request
     * @return mixed
     */
    public function update(Request $request)
    {
        $request->user()->generateRecoveryCodes();

        session()->flash('flash_warning', __('Any old backup codes have been invalidated.'));

        return redirect()->route($this->redirectBase.'.auth.account.2fa.show')->withFlashSuccess(__('Two Factor Recovery Codes Regenerated'));
    }
}
