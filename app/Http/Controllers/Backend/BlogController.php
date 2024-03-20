<?php
namespace App\Http\Controllers\Backend;

use App\Models\Blog;
use App\Services\BlogService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\UpdateBlogRequest;

class BlogController extends Controller
{
    /**
     * BlogService $blogService
     */
    protected BlogService $blogService;
    
    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    /**
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('backend.blog.index')->withBlogs($blogs);
    }
    
    /**
     * @param UpdateBlogRequest $request
     * @return mixed
     
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(Blog $blog, UpdateBlogRequest $request)
    {
        $data = $request->validated();
        $image = $blog->image;
        if(!empty($data['image'])) {
            $image = $data['image']->store('blogs');
        }
        $data['image'] = $image;

        $this->blogService->update($blog, $data);

        return redirect()->route('admin.blog.index')->withFlashSuccess(__('The blog was successfully updated.'));
    }
}