<?php

namespace App\Http\Requests\Broker;

use Illuminate\Validation\Rule;
use App\Domains\Auth\Rules\UnusedPassword;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Auth\Access\AuthorizationException;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;

/**
 * Class UpdateBrokerRequest.
 */
class UpdateBrokerRequest extends FormRequest
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
            'broker_id' => ['required', 'string', 'max:199', Rule::unique('brokers')->ignore($this->broker->id)->whereNull('deleted_at')],
            'broker_server' => ['required', 'string', 'max:199'],
            'broker_password' => ['required', 'string', 'max:199'],
            'pairs' => ['required', 'string', 'max:199'],
            'risk_calculator_id' => ['required', 'integer', 'exists:risk_calculators,id'],
            'lot' => ['required', 'decimal:0,2'],
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
