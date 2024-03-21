<?php

namespace App\Http\Requests\HelpCenter;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Auth\Access\AuthorizationException;

/**
 * Class StoreHelpCenterRequest.
 */
class StoreHelpCenterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'help_category_id' => ['required', 'exists:help_categories,id'],
            'title' => ['required', 'string', 'max:191'],
            'explanation' => ['sometimes', 'string', 'max:1500'],
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
        throw new AuthorizationException(__('You can not add the helpcenter.'));
    }
}
