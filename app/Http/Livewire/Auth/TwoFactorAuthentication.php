<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Http\Request;

/**
 * Class TwoFactorAuthentication.
 */
class TwoFactorAuthentication extends Component
{
    /**
     * @var
     */
    public $code;
    protected $redirectBase;

    public function __construct()
    {
        $this->redirectBase = request()->routeIs('admin.*') ? 'admin' : 'frontend';
    }
    
    /**
     * @param  Request  $request
     * @return mixed
     */
    public function validateCode(Request $request)
    {
        $this->validate([
            'code' => 'required|min:6',
        ]);

        if ($request->user()->confirmTwoFactorAuth($this->code)) {
            $this->resetErrorBag();

            session()->flash('flash_success', __('Two Factor Authentication Successfully Enabled'));

            return redirect()->route($this->redirectBase.'.auth.account.2fa.show');
        }

        $this->addError('code', __('Your authorization code was invalid. Please try again.'));

        return false;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function render()
    {
        return view('components.auth.two-factor-authentication');
    }
}
