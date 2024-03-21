<?php

namespace App\Http\Controllers\Backend;

use App\Services\HelpCategoryService;
use App\Http\Requests\HelpCategory\StoreHelpCategoryRequest;

/**
 * Class HelpCategoryController.
 */
class HelpCategoryController
{
    /**
     * @var HelpCategoryService
     */
    protected $helpCategoryService;
    
    /**
     * HelpCategoryController constructor.
     *
     * @param  HelpCategoryService  $helpCategoryService
     */
    public function __construct(HelpCategoryService $helpCategoryService)
    {
        $this->helpCategoryService = $helpCategoryService;
    }

    /**
     * @param  StoreHelpCategoryRequest  $request
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreHelpCategoryRequest $request)
    {
        $this->helpCategoryService->store($request->validated());

        return redirect()->back()->withFlashSuccess(__('The helpcategory was successfully created.'));
    }
}
