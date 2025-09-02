<?php

namespace App\Http\Controllers\frontend;




use App\Models\Setting;
use App\Models\StudentService;
use App\Models\StudyAbroadInfo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentServicesController extends Controller
{
    public function index($slug)
    {

        $setting = Setting::first();
        $studentservices = StudentService::where('slug', $slug)->first();

        return view("frontend.student-services", compact("setting","studentservices"));
    }

   
}
