<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class BrokerController extends Controller
{
    /**
     * @return Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('frontend.broker.index');
    }
    
    /**
     * @return Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('frontend.broker.create');
    }
}