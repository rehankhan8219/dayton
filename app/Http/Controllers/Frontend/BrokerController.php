<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Broker;
use App\Models\RiskCalculator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class BrokerController extends Controller
{
    /**
     * @return Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $broker_list = Broker::where('user_id', auth()->user()->id)->get();

        return view('frontend.broker.index', compact('broker_list'));
    }
    
    /**
     * @return Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        $risk_levels = RiskCalculator::pluck('risk_level', 'id')->toArray();

        return view('frontend.broker.create', compact('risk_levels'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'broker_id' => ['required', 'string', 'max:199', Rule::unique('brokers')],
            'broker_server' => ['required', 'string', 'max:199'],
            'broker_password' => ['required', 'string', 'max:199'],
            'pairs' => ['required', 'string', 'max:199'],
            'risk_calculator_id' => ['required', 'integer', 'exists:risk_calculators,id'],
            'lot' => ['required', 'decimal:0,2'],
            // 'active' => ['sometimes', 'in:0,1'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $broker = Broker::create([
                'user_id' => auth()->user()->id,
                'broker_id' => $request->broker_id,
                'broker_server' => $request->broker_server,
                'broker_password' => $request->broker_password,
                'pairs' => $request->pairs,
                'risk_calculator_id' => $request->risk_calculator_id,
                'lot' => $request->lot,
                'active' => 0,
            ]);


        return redirect()->back()->withFlashSuccess(__('The broker was successfully created.'));
    }

    public function edit(Broker $broker)
    {

        $risk_levels = RiskCalculator::pluck('risk_level', 'id')->toArray();

        return view('frontend.broker.edit', compact('risk_levels', 'broker'));
    }

    public function update(Request $request, Broker $broker)
    {
        
        $validator = Validator::make($request->all(), [
            'broker_id' => ['required', 'string', 'max:199', Rule::unique('brokers')->ignore($broker->id)],
            'broker_server' => ['required', 'string', 'max:199'],
            'broker_password' => ['required', 'string', 'max:199'],
            'pairs' => ['required', 'string', 'max:199'],
            'risk_calculator_id' => ['required', 'integer', 'exists:risk_calculators,id'],
            'lot' => ['required', 'decimal:0,2'],
            // 'active' => ['sometimes', 'in:0,1'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $broker = $broker->update([
                'user_id' => auth()->user()->id,
                'broker_id' => $request->broker_id,
                'broker_server' => $request->broker_server,
                'broker_password' => $request->broker_password,
                'pairs' => $request->pairs,
                'risk_calculator_id' => $request->risk_calculator_id,
                'lot' => $request->lot,
                // 'active' => 0,
            ]);


        return redirect()->back()->withFlashSuccess(__('The broker was successfully updated.'));
    }
}