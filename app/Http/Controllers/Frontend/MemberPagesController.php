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

    public function withDraw()
    {
        return view('frontend.member.withdraw');
    }

    public function withdrawRequestSubmit()
    {
        return view('frontend.member.withdraw_request_submit');
    }

    public function withdrawToHistory()
    {
        return view('frontend.member.withdraw_to_history');
    }

    public function commisionReport()
    {
        return view('frontend.member.commision_report');
    }

    public function Profile()
    {
        return view('frontend.member.profile');
    }

    public function contactUs()
    {
        return view('frontend.member.contact_us');
    }

    public function helpCenter()
    {
        return view('frontend.member.help_center');
    }

}
