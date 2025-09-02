<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectImage;



use App\Models\Setting;
class UpcomingProjectsController extends Controller
{
    public function index()
    {
        $setting = Setting::first();

        $projects= Project::where('project_status','upcoming')->get();
        
        $project= Project::where('project_status','upcoming')->first();
       
    

        return view("frontend.upcoming-projects",compact("projects","setting","project"));
    }
}
