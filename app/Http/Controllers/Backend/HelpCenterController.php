<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\HelpCenter;
use App\Services\HelpCenterService;
use App\Services\HelpCategoryService;
use App\Http\Requests\HelpCenter\EditHelpCenterRequest;
use App\Http\Requests\HelpCenter\StoreHelpCenterRequest;
use App\Http\Requests\HelpCenter\DeleteHelpCenterRequest;
use App\Http\Requests\HelpCenter\UpdateHelpCenterRequest;

/**
 * Class HelpCenterController.
 */
class HelpCenterController
{
    /**
     * @var HelpCenterService
     */
    protected $helpCenterService;
    
    /**
     * @var HelpCategoryService
     */
    protected $helpCategoryService;
    
    /**
     * HelpCenterController constructor.
     *
     * @param  HelpCenterService  $helpCenterService
     * @param  HelpCategoryService $helpCategoryService
     */
    public function __construct(HelpCenterService $helpCenterService, HelpCategoryService $helpCategoryService)
    {
        $this->helpCenterService = $helpCenterService;
        $this->helpCategoryService = $helpCategoryService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.helpcenter.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.helpcenter.create')
            ->withHelpCategories($this->helpCategoryService->get());
    }

    /**
     * @param  StoreHelpCenterRequest  $request
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreHelpCenterRequest $request)
    {
        $this->helpCenterService->store($request->validated());

        return redirect()->route('admin.helpcenter.index')->withFlashSuccess(__('The helpcenter was successfully created.'));
    }

    /**
     * @param  EditHelpCenterRequest  $request
     * @param  HelpCenter  $helpcenter
     * @return mixed
     */
    public function edit(EditHelpCenterRequest $request, HelpCenter $helpcenter)
    {
        return view('backend.helpcenter.edit')
            ->withHelpCategories($this->helpCategoryService->get())
            ->withHelpCenter($helpcenter);
    }

    /**
     * @param  UpdateHelpCenterRequest  $request
     * @param  HelpCenter  $helpcenter
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(UpdateHelpCenterRequest $request, HelpCenter $helpcenter)
    {
        $this->helpCenterService->update($helpcenter, $request->validated());

        return redirect()->route('admin.helpcenter.index')->withFlashSuccess(__('The helpcenter was successfully updated.'));
    }

    /**
     * @param  DeleteHelpCenterRequest  $request
     * @param  HelpCenter  $helpcenter
     * @return mixed
     *
     * @throws \Exception
     */
    public function destroy(DeleteHelpCenterRequest $request, HelpCenter $helpcenter)
    {
        $this->helpCenterService->destroy($helpcenter);

        return redirect()->route('admin.helpcenter.index')->withFlashSuccess(__('The helpcenter was successfully deleted.'));
    }
}
