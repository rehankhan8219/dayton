<?php
namespace App\Http\Controllers\Backend;

use App\Services\UserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UpdateProfileRequest;

class ProfileController extends Controller
{
    /**
     * UserService $userService
     */
    protected UserService $userService;
    
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @return mixed
     */
    public function showEditProfileForm()
    {
        return view('backend.profile');
    }

    /**
     * @param  UpdateProfileRequest  $request
     * @param  User  $user
     * @return mixed
     *
     * @throws \Throwable
     */
    public function update(UpdateProfileRequest $request)
    {
        $user = auth()->user();
        $user->username = $request->username;
        
        if($request->password) {
            $user->password_alt = $request->password;
        }

        $user->save();

        return redirect()->route('admin.dashboard')->withFlashSuccess(__('The profile was successfully updated.'));
    }
}