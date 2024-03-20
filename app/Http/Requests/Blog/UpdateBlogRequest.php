<?php

namespace App\Http\Requests\Blog;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Auth\Access\AuthorizationException;

/**
 * Class UpdateBlogRequest.
 */
class UpdateBlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('admin.access.blog');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'subtitle' => ['required', 'max:255'],
            'script' => ['nullable', 'string'],
            'image' => ['sometimes', 'nullable', 'image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'video' => ['sometimes', 'nullable', 'url'],
        ];
    }

    /**
     * Handle a failed authorization attempt.
     *
     * @return void
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    protected function failedAuthorization()
    {
        throw new AuthorizationException(__('You can not edit the blog.'));
    }
}
