<?php

namespace App\Http\Controllers\Backend;

use App\Models\Role;
use App\Services\RoleService;
use App\Services\PermissionService;
use App\Http\Requests\Role\EditRoleRequest;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\DeleteRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;

/**
 * Class RoleController.
 */
class RoleController
{
    /**
     * @var RoleService
     */
    protected $roleService;

    /**
     * @var PermissionService
     */
    protected $permissionService;

    /**
     * RoleController constructor.
     *
     * @param  RoleService  $roleService
     * @param  PermissionService  $permissionService
     */
    public function __construct(RoleService $roleService, PermissionService $permissionService)
    {
        $this->roleService = $roleService;
        $this->permissionService = $permissionService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.role.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.role.create')
            ->withCategories($this->permissionService->getCategorizedPermissions())
            ->withGeneral($this->permissionService->getUncategorizedPermissions());
    }

    /**
     * @param  StoreRoleRequest  $request
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreRoleRequest $request)
    {
        $this->roleService->store($request->validated());

        return redirect()->route('admin.role.index')->withFlashSuccess(__('The role was successfully created.'));
    }

    /**
     * @param  EditRoleRequest  $request
     * @param  Role  $role
     * @return mixed
     */
    public function edit(EditRoleRequest $request, Role $role)
    {
        return view('backend.role.edit')
            ->withCategories($this->permissionService->getCategorizedPermissions())
            ->withGeneral($this->permissionService->getUncategorizedPermissions())
            ->withRole($role)
            ->withUsedPermissions($role->permissions->modelKeys());
    }

    /**
     * @param  UpdateRoleRequest  $request
     * @param  Role  $role
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $this->roleService->update($role, $request->validated());

        return redirect()->route('admin.role.index')->withFlashSuccess(__('The role was successfully updated.'));
    }

    /**
     * @param  DeleteRoleRequest  $request
     * @param  Role  $role
     * @return mixed
     *
     * @throws \Exception
     */
    public function destroy(DeleteRoleRequest $request, Role $role)
    {
        $this->roleService->destroy($role);

        return redirect()->route('admin.role.index')->withFlashSuccess(__('The role was successfully deleted.'));
    }
}
