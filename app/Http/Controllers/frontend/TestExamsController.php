<?php

namespace App\Http\Controllers\frontend;

use App\Models\Setting;
use App\Models\TestExam;
use App\Models\StudyAbroadInfo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestExamsController extends Controller
{
    public function index($slug)
    {

        $setting = Setting::first();
        $testExam = TestExam::where('slug', $slug)->first();

        return view("frontend.test-exams", compact("setting","testExam"));
    }

   
}
