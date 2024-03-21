<?php

namespace App\Services;

use Exception;
use App\Models\HelpCategory;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;

/**
 * Class HelpCategoryService.
 */
class HelpCategoryService extends BaseService
{
    /**
     * HelpCategoryService constructor.
     *
     * @param  HelpCategory  $helpcategory
     */
    public function __construct(HelpCategory $helpcategory)
    {
        $this->model = $helpcategory;
    }

    /**
     * @param  array  $data
     * @return HelpCategory
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): HelpCategory
    {
        DB::beginTransaction();

        try {
            $helpcategory = $this->model::create([
                'name' => $data['name'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating the helpcategory.'));
        }

        DB::commit();

        return $helpcategory;
    }

    /**
     * @param  HelpCategory  $helpcategory
     * @param  array  $data
     * @return HelpCategory
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update(HelpCategory $helpcategory, array $data = []): HelpCategory
    {
        DB::beginTransaction();

        try {
            $helpcategory->update([
                'name' => $data['name'],
            ]);
            
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating the helpcategory.'));
        }

        DB::commit();

        return $helpcategory;
    }

    /**
     * @param  HelpCategory  $helpcategory
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(HelpCategory $helpcategory): bool
    {
        if ($this->deleteById($helpcategory->id)) {
            return true;
        }

        throw new GeneralException(__('There was a problem deleting the helpcategory.'));
    }
}
