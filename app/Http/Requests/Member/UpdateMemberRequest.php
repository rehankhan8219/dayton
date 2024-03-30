<?php

namespace App\Http\Requests\Member;

use Illuminate\Validation\Rule;
use App\Domains\Auth\Rules\UnusedPassword;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Auth\Access\AuthorizationException;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;

/**
 * Class UpdateMemberRequest.
 */
class UpdateMemberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('admin.access.user');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'dt_code' => ['required', 'string', 'max:199', Rule::unique('users')->ignore($this->member->id)],
            'name' => ['required', 'string', 'max:199'],
            'email' => ['required', 'string', 'email', 'max:199', Rule::unique('users')->ignore($this->member->id)],
            'phone' => ['required', 'string', 'max:20', Rule::unique('users')->ignore($this->member->id)],
            'country' => ['required', 'string', 'max:199'],
            'password_alt' => ['required', 'string', 'min:8', 'max:50'],
            'upline' => ['nullable', 'string', 'max:199'],
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
        throw new AuthorizationException(__('You can not update this member.'));
    }
}
