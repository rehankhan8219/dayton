<?php

namespace App\Http\Requests\RiskCalculator;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Auth\Access\AuthorizationException;

/**
 * Class StoreRiskCalculatorRequest.
 */
class StoreRiskCalculatorRequest extends FormRequest
{
    /**
     * Determine if the riskcalculator is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('admin.access.risk_calculator');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pairs' => ['required', 'string', 'max:191'],
            'risk_level' => ['required', 'string', 'max:191'],
            'lot' => ['required', 'numeric'],
            'balance' => ['required', 'numeric'],
            'explanation' => ['required', 'max:1000'],
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
        throw new AuthorizationException(__('You can not add the risk calculator.'));
    }
}
