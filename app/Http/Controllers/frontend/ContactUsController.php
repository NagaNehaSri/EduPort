<?php

namespace App\Http\Controllers\frontend;

use App\Models\Setting;
use App\Models\Contact;
use App\Models\Cms;
use App\Models\Inquiry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {

        $setting = Setting::first();
        $cms = Cms::all();
        return view("frontend.contact", compact("setting", "cms"));
    }
    public function terms()
    {

        $setting = Setting::first();
        $cms = Cms::all();
        return view("frontend.terms-conditions", compact("setting", "cms"));
    }
    public function privacy()
    {

        $setting = Setting::first();
        $cms = Cms::all();
        return view("frontend.privacy-policy", compact("setting", "cms"));
    }
    public function refund()
    {

        $setting = Setting::first();
        $cms = Cms::all();
        return view("frontend.refund-policy", compact("setting", "cms"));
    }
    public function save(Request $request)
    {
        $data = $this->validate($request, [
            'email' => 'required|email',
            // 'phone' => 'required|regex:/^[0-9]{10}$/',
            'name' => 'required',
            'subject' => 'required',
            'message' => 'required',

        ]);

        Contact::create($data);
        $success = "Thank you for Contact us! we will connect you soon";
        return response()->json(['message' => $success]);
        // return redirect()->route('contact')->with('success', 'Thank you for contacting us! we will connect you soon');
    }
    public function inquiry(Request $request)
    {
        $data = $request->validate([
            'inquiryname' => 'required|string|max:255',
            'inquiryemail' => 'required|email',
            'inquiryphone' => 'required|digits:10',
            'inquiryservice' => 'required|string',
            'inquirycomments' => 'required|string',
        ]);
        dd($request->inquiryname);

        Inquiry::create($data);
        $success = "Thank you for Inquiry! We will connect with you soon.";
        return response()->json(['message' => $success]);
        // return redirect()->route('contact')->with('success', 'Thank you for contacting us! we will connect you soon');
    }
}
