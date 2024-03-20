<?php
namespace App\Http\Controllers\Backend;

use App\Models\Broker;
use App\Models\User as Member;
use App\Services\BrokerService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Broker\EditBrokerRequest;
use App\Http\Requests\Broker\DeleteBrokerRequest;
use App\Http\Requests\Broker\StoreBrokerRequest;
use App\Http\Requests\Broker\UpdateBrokerRequest;
use App\Services\RiskCalculatorService;

class BrokerController extends Controller
{
    /**
     * BrokerService $brokerService
     */
    protected BrokerService $brokerService;
    
    /**
     * RiskCalculatorService $riskCalculatorService
     */
    protected RiskCalculatorService $riskCalculatorService;
    
    public function __construct(BrokerService $brokerService, RiskCalculatorService $riskCalculatorService)
    {
        $this->brokerService = $brokerService;
        $this->riskCalculatorService = $riskCalculatorService;
    }

    /**
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('backend.broker.index');
    }
    
    /**
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create(Member $member)
    {
        return view('backend.broker.create')
            ->withRisks($this->riskCalculatorService->get())
            ->withMember($member);
    }
    
    /**
     * @param Member $member
     * @param StoreBrokerRequest $request
     * @return mixed
     
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(Member $member, StoreBrokerRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = $member->id;
        $this->brokerService->store($data);

        return redirect()->route('admin.member.index', ['dt_code' => $member->dt_code])->withFlashSuccess(__('The broker was successfully created.'));
    }

    /**
     * @param  Member  $member
     * @param  Broker  $broker
     * @return mixed
     */
    public function show(Member $member, Broker $broker)
    {
        return view('backend.broker.show')->withBroker($broker);
    }
    
    /**
     * @param Member $member
     * @param Broker $broker
     * @param EditBrokerRequest $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(Member $member, Broker $broker, EditBrokerRequest $request)
    {
        return view('backend.broker.edit')
            ->withBroker($broker)
            ->withRisks($this->riskCalculatorService->get())
            ->withMember($member);
    }
    
    /**
     * @param Member $member 
     * @param Broker $broker 
     * @param UpdateBrokerRequest $request
     * @return mixed
     
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(Member $member, Broker $broker, UpdateBrokerRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = $member->id;
        $this->brokerService->update($broker, $data);

        return redirect()->route('admin.member.index', ['dt_code' => $member->dt_code])->withFlashSuccess(__('The broker was successfully updated.'));
    }
    
    /**
     * @param Member $member
     * @param DeleteBrokerRequest $request
     * @return mixed
     
    * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function delete(Member $member, Broker $broker, DeleteBrokerRequest $request)
    {
        $broker->delete();
        return redirect()->route('admin.member.index', ['dt_code' => $member->dt_code])->withFlashSuccess(__('The broker was successfully deleted.'));
    }

    /**
     * @param  Member  $member
     * @return mixed
     */
    public function getByMemberId(Member $member)
    {
        $options = '';
        foreach($member->brokers as $broker) {
            $options .= html()->option($broker->broker_id, $broker->id);
        }
        
        return response()->json(['success' => 1, 'html' => $options, 'name' => $member->name]);
    }
}