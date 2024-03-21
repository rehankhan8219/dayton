<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }

    public function aboutUs()
    {
        return view('frontend.about-us');
    }

    public function product()
    {
        return view('frontend.product');
    }

    public function career()
    {
        return view('frontend.career');
    }

}
