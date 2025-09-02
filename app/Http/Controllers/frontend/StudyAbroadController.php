<?php

namespace App\Http\Controllers\frontend;




use App\Models\Setting;
use App\Models\StudyAbroad;
use App\Models\StudyAbroadInfo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudyAbroadController extends Controller
{
    public function index($slug)
    {

        $setting = Setting::first();
        $studyabroad = StudyAbroad::where('slug', $slug)->first();
        $studyabroadinformation=StudyAbroadInfo::where("studyabroad_id",$studyabroad->id)->get();

        return view("frontend.study-in-usa", compact("setting","studyabroad","studyabroadinformation"));
    }


}
