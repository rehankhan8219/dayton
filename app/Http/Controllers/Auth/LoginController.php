<?php

namespace App\Http\Controllers\Auth;

use App\Rules\Captcha;
use Illuminate\Http\Request;
use App\Events\User\UserLoggedIn;
use Laragear\TwoFactor\Facades\Auth2FA;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Exceptions\HttpResponseException;

/**
 * Class LoginController.
 */
class LoginController
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected $directory;
    protected $redirectBase;

    public function __construct(Request $request)
    {
        $this->directory = $request->routeIs('admin.*') ? 'backend' : 'frontend';
        $this->redirectBase = $request->routeIs('admin.*') ? 'admin' : 'frontend';
    }

    public function login(){
        return view('frontend.login');
    }

    public function register(){
         return view('frontend.signup');
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }

    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    public function redirectPath()
    {
        return route(homeRoute());
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm(Request $request)
    {
        return view($this->directory.'.auth.login')->withRedirectBase($this->redirectBase);
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        if ($request->isNotFilled('2fa_code')) {
            $request->validate([
                $this->username() => ['required', 'max:255', 'string'],
                'password' => ['max:100', 'required', 'string'],
                'g-recaptcha-response' => ['required_if:captcha_status,true', new Captcha],
            ], [
                'g-recaptcha-response.required_if' => __('validation.required', ['attribute' => 'captcha']),
            ]);
        }
    }

    /**
     * Overidden for 2FA
     * https://github.com/Laragear/TwoFactor.
     *
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        try {
            return Auth2FA::attempt($this->credentials($request), $request->filled('remember'));
        } catch (HttpResponseException $exception) {
            $this->incrementLoginAttempts($request);

            throw $exception;
        }
    }

    /**
     * The user has been authenticated.
     *
     * @param  Request  $request
     * @param $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        if (! $user->isActive()) {
            auth()->logout();

            return redirect()->route($this->directory.'.auth.login')->withFlashDanger(__('Your account has been deactivated.'));
        }

        event(new UserLoggedIn($user));

        if (config('boilerplate.access.user.single_login')) {
            auth()->logoutOtherDevices($request->password);
        }
    }
}
