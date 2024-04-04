<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Validation\Rule;
use App\Exceptions\GeneralException;
use App\Http\Controllers\Api\Traits\ApiResponse;

class UserController
{
    use ApiResponse;

    /**
     * Request
     */
    protected $request;
    
    /**
     * UserService
     */
    protected $userService;

    /**
     * @param Request $request
     */
    public function __construct(Request $request, UserService $userService)
    {
        $this->request = $request;
        $this->userService = $userService;
    }
    
    /**
     * @return json
     */
    public function updateProfile()
    {
        try {
            $rules = [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(auth()->user()->id)->whereNull('deleted_at')],
                'phone' => ['nullable', 'numeric', 'digits_between:10,20', Rule::unique('users')->ignore(auth()->user()->id)->whereNull('deleted_at')],
                'password' => ['nullable', 'string', 'min:8'],
                'country' => ['required', 'string', 'max:191'],
            ];

            $validator = $this->validateParams($this->request->all(), $rules);
    
            if ($validator->fails()) {
                return $this->respondWithError($validator->errors()->first(), 200);
            }

            $data = $validator->valid();
            $data['username'] = auth()->user()->username;
            $data['dt_code'] = auth()->user()->dt_code;
            $data['upline'] = auth()->user()->upline;

            $user = $this->userService->update(auth()->user(), $data);

            $response = $this->generateLoginResponse($user, false);
            return $this->respondWithSuccess('Profile updated successfully!', 200, $response);

        } catch (\Throwable $th) {
            return $this->respondWithError($th->getMessage(), (!empty($th->getCode())? $th->getCode() : 500));
        }
    }
}
