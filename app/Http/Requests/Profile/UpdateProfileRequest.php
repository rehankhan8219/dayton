<?php

namespace App\Http\Requests\Profile;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateProfileRequest.
 */
class UpdateProfileRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => ['required', 'string', 'max:191', Rule::unique('users', 'username')->ignore($this->user()->id)->whereNull('deleted_at')],
            'password' => ['nullable', 'string', 'min:8', 'max:100'/*, 'confirmed'*/],
        ];
    }
}
