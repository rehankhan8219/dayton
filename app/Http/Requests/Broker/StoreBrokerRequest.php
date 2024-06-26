<?php

namespace App\Http\Requests\Broker;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Auth\Access\AuthorizationException;

/**
 * Class StoreBrokerRequest.
 */
class StoreBrokerRequest extends FormRequest
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
            // 'user_id' => ['required', 'integer', Rule::exists('users', 'id')],
            'broker_id' => ['required', 'string', 'max:199', Rule::unique('brokers')->whereNull('deleted_at')],
            'broker_server' => ['required', 'string', 'max:199'],
            'broker_password' => ['required', 'string', 'max:199'],
            'pairs' => ['required', 'string', 'max:199'],
            'risk_level' => ['required', 'string'],
            'lot' => ['required'],
            'active' => ['sometimes', 'in:0,1,2'],
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
        throw new AuthorizationException(__('You can not update this broker.'));
    }
}
