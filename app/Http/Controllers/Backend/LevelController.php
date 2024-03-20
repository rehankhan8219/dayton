<?php

namespace App\Http\Controllers\Backend;

use App\Services\LevelService;
use App\Http\Requests\Level\StoreLevelRequest;

/**
 * Class LevelController.
 */
class LevelController
{
    /**
     * @var LevelService
     */
    protected $levelService;
    
    /**
     * LevelController constructor.
     *
     * @param  LevelService  $levelService
     */
    public function __construct(LevelService $levelService)
    {
        $this->levelService = $levelService;
    }

    /**
     * @param  StoreLevelRequest  $request
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreLevelRequest $request)
    {
        $this->levelService->store($request->validated());

        return redirect()->back()->withFlashSuccess(__('The level was successfully created.'));
    }
}
