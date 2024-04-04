<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Validation\Rule;
use App\Events\User\UserLoggedIn;
use App\Exceptions\GeneralException;
use App\Http\Controllers\Api\Traits\ApiResponse;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class AuthController
{
    use ApiResponse,
        SendsPasswordResetEmails;

    /**
     * Request
     */
    protected $request;

    /**
     * @var UserService
     */
    protected $userService;

    /**
     * @param Request $request
     * @param  UserService  $userService
     */
    public function __construct(Request $request, UserService  $userService)
    {
        $this->request = $request;
        $this->userService = $userService;
    }
    
    /**
     * @return json
     */
    public function register()
    {
        try {
            $validator = $this->validateParams($this->request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'phone' => ['required', 'numeric', 'digits_between:10,20', 'unique:users'],
                'password_alt' => ['required', 'string', 'min:8'],
                'country' => ['required', 'string', 'max:191'],
                'upline' => ['nullable', 'string', 'max:191'],
                'device_type' => ['sometimes', 'nullable', 'in:android,ios,web'],
                'device_token' => ['sometimes', 'nullable', 'string'],
            ]);
            
            if($validator->fails()) {
                throw new GeneralException($validator->errors()->first(), 200);
            }

            // event(new Registered($user = $this->userService->registerUser($validator->valid())));
            $user = $this->userService->registerUser($validator->valid());

            // $user->{'info->device_type'} = $this->request->device_type;
            // $user->{'info->device_token'} = $this->request->device_token;
            
            // if(!$user->wasRecentlyCreated) {
            //     $user->{'info->is_notification'} = 1;
            // }

            $response = $this->generateLoginResponse($user);
            return $this->respondWithSuccess('Your account has been created!', 200, $response);

        } catch (\Throwable $th) {
            return $this->respondWithError($th->getMessage(), (!empty($th->getCode())? $th->getCode() : 500));
        }
    }

    /**
     * @return json
     */
    public function login()
    {
        try {
            $rules = [
                'email' => ['required', 'email', 'max:191', Rule::exists('users')],
                'password' => ['required'],
                'device_type' => ['sometimes', 'nullable', 'in:android,ios,web'],
                'device_token' => ['sometimes', 'nullable', 'string'],
            ];

            $validator = $this->validateParams($this->request->all(), $rules, [
                'phone.exists' => 'Phone no is not registered. Please sign up first!'
            ]);
    
            if ($validator->fails()) {
                return $this->respondWithError($validator->errors()->first(), 200);
            }
            
            $user = User::where('email', $this->request->email)->first();
            if(!$user || ($user && !\Hash::check($this->request->password, $user->password))) {
                throw new GeneralException('Invalid email or password!', 200);
            }

            if (! $user->isActive()) {    
                throw new GeneralException('Your account has been deactivated. Please contact support for activation.', 200);
            }
    
            event(new UserLoggedIn($user));

            // $user->{'info->device_type'} = $this->request->device_type;
            // $user->{'info->device_token'} = $this->request->device_token;
            
            // if(!$user->wasRecentlyCreated) {
            //     $user->{'info->is_notification'} = 1;
            // }
            
            $user->save();

            $response = $this->generateLoginResponse($user);

            return $this->respondWithSuccess('Login successfull!', 200, $response);

        } catch (\Throwable $th) {
            return $this->respondWithError($th->getMessage(), (!empty($th->getCode())? $th->getCode() : 500));
        }
    }
    
    /**
     * Send a new password to a user
     */
    public function forgotPassword()
    {
        try {
            $rules = [
                'phone' => ['required', Rule::exists('users')]
            ];

            $validator = $this->validateParams($this->request->all(), $rules);
    
            if ($validator->fails()) {
                return $this->respondWithError($validator->errors()->first(), 200);
            }
            
            return $this->respondWithSuccess('Phone exists!', 200);
            
        } catch (\Throwable $th) {
            return $this->respondWithError($th->getMessage(), (!empty($th->getCode())? $th->getCode() : 500));
        }
    }
    
    /**
     * Reset a password
     */
    public function resetPassword()
    {
        try {
            $rules = [
                'phone' => ['required', Rule::exists('users')],
                'password' => ['required'],
            ];

            $validator = $this->validateParams($this->request->all(), $rules);
    
            if ($validator->fails()) {
                return $this->respondWithError($validator->errors()->first(), 200);
            }
            
            $user = User::where('phone', $this->request->phone)->first();
            $user->password = $this->request->password;
            $user->save();

            $response = $this->generateLoginResponse($user);
            return $this->respondWithSuccess('Your password has been updated!', 200, $response);
            
        } catch (\Throwable $th) {
            return $this->respondWithError($th->getMessage(), (!empty($th->getCode())? $th->getCode() : 500));
        }
    }
    
    /**
     * Logout a user
     */
    public function logout()
    {
        try {
            if(!auth()->user()->tokens()->delete()) {
                throw new GeneralException('Unable to delete token! Try again later!', 200);
            }
            
            return $this->respondWithSuccess('You have been logged out successfully!', 200);
            
        } catch (\Throwable $th) {
            return $this->respondWithError($th->getMessage(), (!empty($th->getCode())? $th->getCode() : 500));
        }
    }
}
