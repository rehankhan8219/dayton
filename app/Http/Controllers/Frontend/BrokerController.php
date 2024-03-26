<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Broker;

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
        return view('frontend.broker.create');
    }

    public function edit(Broker $broker)
    {
        return view('frontend.broker.create');
    }
}