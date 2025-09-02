<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Setting;
use App\Models\Count;
use App\Models\About;
use App\Models\AboutImage;
use App\Models\Team;
use App\Models\WhyChooseUsAbout;
use App\Models\WhyChooseUs;
use App\Models\VisionMission;
use App\Models\WhatWeProvide;
use App\Models\CEOMessage;

class AboutController extends Controller
{
    public function index()
    {
        $about=About::first();
        $ceomessage=CEOMessage::first();

        $visionmission_info=VisionMission::all();
        $whatweprovides=WhatWeProvide::all();

        $settings=Setting::first();
        $counts=Count::all();
        $teams=Team::all();
        $whychooseus=WhyChooseUs::first();
        $whychooseusabout=WhyChooseUsAbout::all();
        $about_images=AboutImage::where("about_id",$about->id)->get();
        return view("frontend.about",compact("about","settings","counts","about_images","teams","whychooseusabout","whychooseus","visionmission_info","whatweprovides","ceomessage"));
    }
}
