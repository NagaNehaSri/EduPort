<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Setting;
use App\Models\CEOMessage;
use App\Models\About;
use App\Models\AboutImage;
use App\Models\Team;
use App\Models\WhyChooseUsAbout;
use App\Models\WhyChooseUs;

class CeoController extends Controller
{
    public function index()
    {
        $about=About::first();

        $settings=Setting::first();
        $ceomessage=CEOMessage::first();
        $teams=Team::all();
        $whychooseus=WhyChooseUs::first();
        $whychooseusabout=WhyChooseUsAbout::all();
        $about_images=AboutImage::where("about_id",$about->id)->get();
        return view("frontend.ceo-message",compact("about","settings","about_images","teams","whychooseusabout","whychooseus","ceomessage"));
    }
}
