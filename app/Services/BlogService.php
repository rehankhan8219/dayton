<?php

namespace App\Services;

use Exception;
use App\Models\Blog;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;

/**
 * Class BlogService.
 */
class BlogService extends BaseService
{
    /**
     * BlogService constructor.
     *
     * @param  Blog  $blog
     */
    public function __construct(Blog $blog)
    {
        $this->model = $blog;
    }

    /**
     * @param  array  $data
     * @return Blog
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Blog
    {
        DB::beginTransaction();

        try {
            $blog = $this->model::create([
                'subtitle' => $data['subtitle'] ?? null,
                'script' => $data['script'] ?? null,
                'image' => $data['image'] ?? null,
                'video' => $data['video'] ?? null,
            ]);

        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating the blog.'));
        }

        DB::commit();

        return $blog;
    }

    /**
     * @param  Blog  $blog
     * @param  array  $data
     * @return Blog
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update(Blog $blog, array $data = []): Blog
    {
        DB::beginTransaction();

        try {
            $blog->update([
                'subtitle' => $data['subtitle'] ?? null,
                'script' => $data['script'] ?? null,
                'image' => $data['image'] ?? null,
                'video' => $data['video'] ?? null,
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            
            throw new GeneralException(__('There was a problem updating the blog.'));
        }

        DB::commit();

        return $blog;
    }

    /**
     * @param  Blog  $blog
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(Blog $blog): bool
    {
        if ($this->deleteById($blog->id)) {
            return true;
        }

        throw new GeneralException(__('There was a problem deleting the blog.'));
    }
}
