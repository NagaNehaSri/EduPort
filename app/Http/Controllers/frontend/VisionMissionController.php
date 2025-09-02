<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Setting;
use App\Models\VisionMission;
use App\Models\VisionMissionSpecification;
use App\Models\About;
use App\Models\AboutImage;
use App\Models\Team;
use App\Models\WhyChooseUsAbout;
use App\Models\WhyChooseUs;

class VisionMissionController extends Controller
{
    public function index()
    {
        

        $settings=Setting::first();
        $visionmission=VisionMission::first();
        $visionmissionspecifications=VisionMissionSpecification::all();
        $teams=Team::all();
        $whychooseus=WhyChooseUs::first();
        $whychooseusabout=WhyChooseUsAbout::all();
        
        return view("frontend.vision-mission",compact("visionmission","settings","visionmissionspecifications"));
    }
}
