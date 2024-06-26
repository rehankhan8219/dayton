<?php

namespace App\Http\Requests\GrowTree;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Auth\Access\AuthorizationException;

/**
 * Class StoreGrowTreeRequest.
 */
class StoreGrowTreeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('admin.access.grow_tree');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => ['required', 'exists:users,id', Rule::unique('grow_trees', 'user_id')->whereNull('deleted_at')],
            'level_id' => ['required', 'exists:levels,id'],
            'diagram' => ['required', 'image', 'max:2048'],
        ];
    }
    
    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'user_id.unique' => __('Selected DT Code is already added'),
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
        throw new AuthorizationException(__('You can not add the growtree.'));
    }
}
