<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberPagesController extends Controller
{
    public function home()
    {
        return view('frontend.member.home');
    }

    public function brokerList()
    {
        return view('frontend.member.broker_list');
    }

    public function addAccount()
    {
        return view('frontend.member.add_account');
    }

    public function payNow()
    {
        return view('frontend.member.pay_now');
    }

    public function growTeamPage()
    {
        return view('frontend.member.grow_team_page');
    }
    

}
