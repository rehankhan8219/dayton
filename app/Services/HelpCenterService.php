<?php

namespace App\Services;

use Exception;
use App\Models\HelpCenter;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;

/**
 * Class HelpCenterService.
 */
class HelpCenterService extends BaseService
{
    /**
     * HelpCenterService constructor.
     *
     * @param  HelpCenter  $helpcenter
     */
    public function __construct(HelpCenter $helpcenter)
    {
        $this->model = $helpcenter;
    }

    /**
     * @param  array  $data
     * @return HelpCenter
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): HelpCenter
    {
        DB::beginTransaction();

        try {
            $helpcenter = $this->model::create([
                'help_category_id' => $data['help_category_id'],
                'title' => $data['title'],
                'explanation' => $data['explanation'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating the helpcenter.'));
        }

        DB::commit();

        return $helpcenter;
    }

    /**
     * @param  HelpCenter  $helpcenter
     * @param  array  $data
     * @return HelpCenter
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update(HelpCenter $helpcenter, array $data = []): HelpCenter
    {
        DB::beginTransaction();

        try {
            $helpcenter->update([
                'help_category_id' => $data['help_category_id'],
                'title' => $data['title'],
                'explanation' => $data['explanation'],
            ]);
            
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating the helpcenter.'));
        }

        DB::commit();

        return $helpcenter;
    }

    /**
     * @param  HelpCenter  $helpcenter
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(HelpCenter $helpcenter): bool
    {
        if ($this->deleteById($helpcenter->id)) {
            return true;
        }

        throw new GeneralException(__('There was a problem deleting the helpcenter.'));
    }
}
