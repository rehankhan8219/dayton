<?php
namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Services\RoleService;
use App\Services\UserService;
use App\Services\PermissionService;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\EditUserRequest;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\DeleteUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\ClearUserSessionRequest;
use App\Http\Requests\User\EditUserPasswordRequest;
use App\Http\Requests\User\UpdateUserPasswordRequest;

class UserController extends Controller
{
    /**
     * UserService $userService
     * RoleService $roleService
     * PermissionService $permissionService
     */
    protected UserService $userService;
    protected RoleService $roleService;
    protected PermissionService $permissionService;
    
    public function __construct(UserService $userService, RoleService $roleService, PermissionService $permissionService)
    {
        $this->userService = $userService;
        $this->roleService = $roleService;
        $this->permissionService = $permissionService;
    }

    /**
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('backend.user.index');
    }
    
    /**
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('backend.user.create')
            ->withRoles($this->roleService->get())
            ->withCategories($this->permissionService->getCategorizedPermissions())
            ->withGeneral($this->permissionService->getUncategorizedPermissions());
    }
    
    /**
     * @param StoreUserRequest $request
     * @return mixed
     
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreUserRequest $request)
    {
        $this->userService->store($request->validated());

        return redirect()->route('admin.user.index')->withFlashSuccess(__('The user was successfully created.'));
    }

    /**
     * @param  User  $user
     * @return mixed
     */
    public function show(User $user)
    {
        return view('backend.user.show')->withUser($user);
    }
    
    /**
     * @param User $user
     * @param EditUserRequest $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(User $user, EditUserRequest $request)
    {
        return view('backend.user.edit')
            ->withUser($user)
            ->withRoles($this->roleService->get())
            ->withCategories($this->permissionService->getCategorizedPermissions())
            ->withGeneral($this->permissionService->getUncategorizedPermissions())
            ->withUsedPermissions($user->permissions->modelKeys());
    }
    
    /**
     * @param UpdateUserRequest $request
     * @return mixed
     
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(User $user, UpdateUserRequest $request)
    {
        $this->userService->update($user, $request->validated());

        return redirect()->route('admin.user.index')->withFlashSuccess(__('The user was successfully updated.'));
    }
    
    /**
     * @param DeleteUserRequest $request
     * @return mixed
     
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function delete(User $user, DeleteUserRequest $request)
    {
        $user->delete();
        return redirect()->route('admin.user.index')->withFlashSuccess(__('The user was successfully deleted.'));
    }
    
    /**
     * @param DeleteUserRequest $request
     * @return mixed
     
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function clearSession(User $user, ClearUserSessionRequest $request)
    {
        $user->update(['to_be_logged_out' => true]);

        return redirect()->back()->withFlashSuccess(__('The user\'s session was successfully cleared.'));
    }

    /**
     * @param  Request  $request
     * @param  User  $user
     * @param $status
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     */
    public function updateActiveStatus(User $user, $status)
    {
        $this->userService->mark($user, (int) $status);

        return redirect()->route('admin.user.index')->withFlashSuccess(__('The user was successfully '.(((int) $status === 1) ? 'activated' : 'deactivated')));
    }

    /**
     * @param  EditUserPasswordRequest  $request
     * @param  User  $user
     * @return mixed
     */
    public function showEditPasswordForm(EditUserPasswordRequest $request, User $user)
    {
        return view('backend.user.change-password')->withUser($user);
    }

    /**
     * @param  UpdateUserPasswordRequest  $request
     * @param  User  $user
     * @return mixed
     *
     * @throws \Throwable
     */
    public function updatePassword(UpdateUserPasswordRequest $request, User $user)
    {
        $this->userService->updatePassword($user, $request->validated());

        return redirect()->route('admin.user.index')->withFlashSuccess(__('The user\'s password was successfully updated.'));
    }
}