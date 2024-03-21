<?php

namespace App\Http\Requests\PayAccount;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Validation\Rule;

/**
 * Class UpdatePayAccountRequest.
 */
class UpdatePayAccountRequest extends FormRequest
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
            'from_user_id' => ['required', 'exists:users,id', 'different:from_user_id'],
            'to_user_id' => ['required', 'exists:users,id'],
            'bank' => ['required', 'string', 'max:191'],
            'bank_account' => ['required', 'numeric'],
            'bank_account_name' => ['required', 'string', 'max:191'],
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
        throw new AuthorizationException(__('You can not edit this payaccount.'));
    }
}
