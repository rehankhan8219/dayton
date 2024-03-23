<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    public function redirectPath()
    {
        return route(homeRoute());
    }

    protected $directory;
    protected $redirectBase;

    /**
     * @var UserService
     */
    protected $userService;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request, UserService $userService)
    {
        $this->middleware('guest');

        // Admin has no register option
        if($request->routeIs('admin.*')) {
            return redirect()->route('frontend.auth.register', 301);
        }

        $this->directory = $request->routeIs('admin.*') ? 'backend' : 'frontend';
        $this->redirectBase = $request->routeIs('admin.*') ? 'admin' : 'frontend';

        $this->userService = $userService;
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view($this->directory.'.auth.register')->withRedirectBase($this->redirectBase);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'numeric', 'digits_between:10,20', 'unique:users'],
            'password_alt' => ['required', 'string', 'min:8', 'confirmed'],
            'country' => ['required', 'string', 'max:191'],
            'upline' => ['required', 'string', 'max:191'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        abort_unless(config('boilerplate.access.user.registration'), 404);

        return $this->userService->registerUser($data);
    }
}
