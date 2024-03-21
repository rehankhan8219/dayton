<?php

namespace App\Services;

use Exception;
use App\Models\Level;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;

/**
 * Class LevelService.
 */
class LevelService extends BaseService
{
    /**
     * LevelService constructor.
     *
     * @param  Level  $level
     */
    public function __construct(Level $level)
    {
        $this->model = $level;
    }

    /**
     * @param  array  $data
     * @return Level
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Level
    {
        DB::beginTransaction();

        try {
            $level = $this->model::create([
                'name' => $data['name'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating the level.'));
        }

        DB::commit();

        return $level;
    }

    /**
     * @param  Level  $level
     * @param  array  $data
     * @return Level
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update(Level $level, array $data = []): Level
    {
        DB::beginTransaction();

        try {
            $level->update([
                'name' => $data['name'],
            ]);
            
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating the level.'));
        }

        DB::commit();

        return $level;
    }

    /**
     * @param  Level  $level
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(Level $level): bool
    {
        if ($this->deleteById($level->id)) {
            return true;
        }

        throw new GeneralException(__('There was a problem deleting the level.'));
    }
}
