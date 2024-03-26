<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HelpCenter;
use App\Models\HelpCategory;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Commission;



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
        $commision_reports = Commission::where('user_id', auth()->user()->id)->get();

        return view('frontend.member.commision_report', compact('commision_reports'));
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
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            // 'phone' => ['required', 'numeric', 'digits_between:10,20'],
            'password' => ['nullable', 'string', 'min:8'],
            'password_confirmation' => ['nullable', 'string', 'min:8', 'same:password'],
            'country' => ['required', 'string', 'max:191'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->country = $request->country;
        $user->phone = $request->phone;

        if(!empty($request->password) && !empty($request->password_confirmation)){
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->back()->withFlashSuccess(__('Profile updated successfully!'));
    }

}
