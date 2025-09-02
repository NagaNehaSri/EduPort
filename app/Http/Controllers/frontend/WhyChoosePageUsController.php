<?php

namespace App\Http\Controllers\frontend;

use App\WhyChooseUsPage;
use App\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class WhyChoosePageUsController extends Controller
{
    public function index()
    {
       
        $whychooseuspage=WhyChooseUsPage::first();
        $settings=setting::first();
       
        return view("frontend.why_choose_us",compact("whychooseuspage","settings"));
    }
}
