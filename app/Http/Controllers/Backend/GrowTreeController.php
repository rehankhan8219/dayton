<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\GrowTree;
use App\Services\UserService;
use App\Services\LevelService;
use App\Services\GrowTreeService;
use App\Http\Requests\GrowTree\EditGrowTreeRequest;
use App\Http\Requests\GrowTree\StoreGrowTreeRequest;
use App\Http\Requests\GrowTree\DeleteGrowTreeRequest;
use App\Http\Requests\GrowTree\UpdateGrowTreeRequest;

/**
 * Class GrowTreeController.
 */
class GrowTreeController
{
    /**
     * @var GrowTreeService
     */
    protected $growTreeService;
    
    /**
     * @var UserService
     */
    protected $userService;
    
    /**
     * @var LevelService
     */
    protected $levelService;

    /**
     * GrowTreeController constructor.
     *
     * @param  GrowTreeService  $growTreeService
     * @param  UserService $userService
     * @param  LevelService $levelService
     */
    public function __construct(GrowTreeService $growTreeService, UserService $userService, LevelService $levelService)
    {
        $this->growTreeService = $growTreeService;
        $this->userService = $userService;
        $this->levelService = $levelService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.growtree.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.growtree.create')
            ->withUsers($this->userService->getByType(User::TYPE_USER))
            ->withLevels($this->levelService->get());
    }

    /**
     * @param  StoreGrowTreeRequest  $request
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreGrowTreeRequest $request)
    {
        $data = $request->validated();
        if($request->hasFile('diagram')) {
            $data['diagram'] = $request->diagram->store('/diagrams');
        }
        else {
            $data['diagram'] = null;
        }

        $this->growTreeService->store($data);

        return redirect()->route('admin.growtree.index')->withFlashSuccess(__('The growtree was successfully created.'));
    }

    /**
     * @param  EditGrowTreeRequest  $request
     * @param  GrowTree  $growtree
     * @return mixed
     */
    public function edit(EditGrowTreeRequest $request, GrowTree $growtree)
    {
        return view('backend.growtree.edit')
            ->withUsers($this->userService->getByType(User::TYPE_USER))
            ->withLevels($this->levelService->get())
            ->withGrowTree($growtree);
    }

    /**
     * @param  UpdateGrowTreeRequest  $request
     * @param  GrowTree  $growtree
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(UpdateGrowTreeRequest $request, GrowTree $growtree)
    {
        $data = $request->validated();
        
        $data['diagram'] = $growtree->diagram;
        if($request->hasFile('diagram')) {
            $data['diagram'] = $request->diagram->store('/diagrams');
        }

        $this->growTreeService->update($growtree, $data);

        return redirect()->route('admin.growtree.index')->withFlashSuccess(__('The growtree was successfully updated.'));
    }

    /**
     * @param  DeleteGrowTreeRequest  $request
     * @param  GrowTree  $growtree
     * @return mixed
     *
     * @throws \Exception
     */
    public function destroy(DeleteGrowTreeRequest $request, GrowTree $growtree)
    {
        $this->growTreeService->destroy($growtree);

        return redirect()->route('admin.growtree.index')->withFlashSuccess(__('The growtree was successfully deleted.'));
    }
}
