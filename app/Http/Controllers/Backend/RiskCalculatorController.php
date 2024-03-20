<?php
namespace App\Http\Controllers\Backend;

use App\Models\RiskCalculator;
use App\Http\Controllers\Controller;
use App\Services\RiskCalculatorService;
use App\Http\Requests\RiskCalculator\EditRiskCalculatorRequest;
use App\Http\Requests\RiskCalculator\StoreRiskCalculatorRequest;
use App\Http\Requests\RiskCalculator\DeleteRiskCalculatorRequest;
use App\Http\Requests\RiskCalculator\UpdateRiskCalculatorRequest;

class RiskCalculatorController extends Controller
{
    /**
     * RiskCalculatorService $riskcalculatorService
     */
    protected RiskCalculatorService $riskcalculatorService;
    
    public function __construct(RiskCalculatorService $riskcalculatorService)
    {
        $this->riskcalculatorService = $riskcalculatorService;
    }

    /**
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('backend.riskcalculator.index');
    }
    
    /**
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('backend.riskcalculator.create');
    }
    
    /**
     * @param StoreRiskCalculatorRequest $request
     * @return mixed
     
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreRiskCalculatorRequest $request)
    {
        $this->riskcalculatorService->store($request->validated());

        return redirect()->route('admin.riskcalculator.index')->withFlashSuccess(__('The riskcalculator was successfully created.'));
    }

    /**
     * @param  RiskCalculator  $riskcalculator
     * @return mixed
     */
    public function show(RiskCalculator $riskcalculator)
    {
        return view('backend.riskcalculator.show')->withRiskCalculator($riskcalculator);
    }
    
    /**
     * @param RiskCalculator $riskcalculator
     * @param EditRiskCalculatorRequest $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(RiskCalculator $riskcalculator, EditRiskCalculatorRequest $request)
    {
        return view('backend.riskcalculator.edit')
            ->withRiskCalculator($riskcalculator);
    }
    
    /**
     * @param UpdateRiskCalculatorRequest $request
     * @return mixed
     
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(RiskCalculator $riskcalculator, UpdateRiskCalculatorRequest $request)
    {
        $this->riskcalculatorService->update($riskcalculator, $request->validated());

        return redirect()->route('admin.riskcalculator.index')->withFlashSuccess(__('The riskcalculator was successfully updated.'));
    }
    
    /**
     * @param DeleteRiskCalculatorRequest $request
     * @return mixed
     
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function delete(RiskCalculator $riskcalculator, DeleteRiskCalculatorRequest $request)
    {
        $riskcalculator->delete();
        return redirect()->route('admin.riskcalculator.index')->withFlashSuccess(__('The riskcalculator was successfully deleted.'));
    }

}