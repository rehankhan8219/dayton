<?php
namespace App\Http\Controllers\Backend;

use App\Services\RoleService;
use App\Models\User as Member;
use App\Services\PermissionService;
use App\Http\Controllers\Controller;
use App\Services\UserService as MemberService;
use App\Http\Requests\Member\EditMemberRequest;
use App\Http\Requests\Member\DeleteMemberRequest;
use App\Http\Requests\Member\UpdateMemberRequest;

class MemberController extends Controller
{
    /**
     * MemberService $memberService
     * RoleService $roleService
     * PermissionService $permissionService
     */
    protected MemberService $memberService;
    protected RoleService $roleService;
    protected PermissionService $permissionService;
    
    public function __construct(MemberService $memberService, RoleService $roleService, PermissionService $permissionService)
    {
        $this->memberService = $memberService;
        $this->roleService = $roleService;
        $this->permissionService = $permissionService;
    }

    /**
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('backend.member.index');
    }
    
    /**
     * @param  Member  $member
     * @return mixed
     */
    public function show(Member $member)
    {
        return view('backend.member.show')->withMember($member);
    }
    
    /**
     * @param Member $member
     * @param EditMemberRequest $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(Member $member, EditMemberRequest $request)
    {
        return view('backend.member.edit')
            ->withMember($member)
            ->withRoles($this->roleService->get())
            ->withCategories($this->permissionService->getCategorizedPermissions())
            ->withGeneral($this->permissionService->getUncategorizedPermissions())
            ->withUsedPermissions($member->permissions->modelKeys());
    }
    
    /**
     * @param UpdateMemberRequest $request
     * @return mixed
     
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(Member $member, UpdateMemberRequest $request)
    {
        $this->memberService->update($member, $request->validated());

        return redirect()->route('admin.member.index')->withFlashSuccess(__('The member was successfully updated.'));
    }
    
    /**
     * @param DeleteMemberRequest $request
     * @return mixed
     
    * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function delete(Member $member, DeleteMemberRequest $request)
    {
        $member->delete();
        return redirect()->route('admin.member.index')->withFlashSuccess(__('The member was successfully deleted.'));
    }
}