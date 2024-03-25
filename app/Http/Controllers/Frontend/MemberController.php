<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HelpCenter;
use App\Models\HelpCategory;


class MemberController extends Controller
{
    public function home()
    {
        return view('frontend.member.home');
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

    public function helpCenter()
    {   
        $help_categories = HelpCategory::get();
        $help_centers = HelpCenter::get();
        return view('frontend.member.help_center', compact('help_categories', 'help_centers'));
    }

    public function contactUs()
    {
        return view('frontend.member.contact_us');
    }

    public function storeContactUs(Request $request)
    {
        activity('helpcenter')
            ->withProperties([
                'helpcenter' => [
                    'subject' => $request->subject,
                    'message' => $request->message
                ],
            ])
            ->log('user sended a message');

        return redirect()->back()->withFlashSuccess(__('Form submited successfully!'));;
    }

    public function Profile()
    {
        $user_detail = auth()->user();
        return view('frontend.member.profile', compact('user_detail'));
    }

    public function updateProfile(Request $request)
    {
        dd($request);

        return redirect()->back()->withFlashSuccess(__('Profile updated successfully!'));;
    }

}
