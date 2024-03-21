<?php

namespace App\Services;

use Exception;
use App\Models\GrowTree;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;

/**
 * Class GrowTreeService.
 */
class GrowTreeService extends BaseService
{
    /**
     * GrowTreeService constructor.
     *
     * @param  GrowTree  $growtree
     */
    public function __construct(GrowTree $growtree)
    {
        $this->model = $growtree;
    }

    /**
     * @param  array  $data
     * @return GrowTree
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): GrowTree
    {
        DB::beginTransaction();

        try {
            $growtree = $this->model::create([
                'user_id' => $data['user_id'],
                'level_id' => $data['level_id'],
                'diagram' => $data['diagram'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating the growtree.'));
        }

        DB::commit();

        return $growtree;
    }

    /**
     * @param  GrowTree  $growtree
     * @param  array  $data
     * @return GrowTree
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update(GrowTree $growtree, array $data = []): GrowTree
    {
        DB::beginTransaction();

        try {
            $growtree->update([
                'user_id' => $data['user_id'],
                'level_id' => $data['level_id'],
                'diagram' => $data['diagram'],
            ]);
            
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating the growtree.'));
        }

        DB::commit();

        return $growtree;
    }

    /**
     * @param  GrowTree  $growtree
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(GrowTree $growtree): bool
    {
        if ($this->deleteById($growtree->id)) {
            return true;
        }

        throw new GeneralException(__('There was a problem deleting the growtree.'));
    }
}
