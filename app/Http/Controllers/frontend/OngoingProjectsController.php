<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectImage;



use App\Models\Setting;
class   OngoingProjectsController extends Controller
{
    public function index()
    {
        $setting = Setting::first();

        $projects= Project::where('project_status','ongoing')->get();
        
        $project= Project::where('project_status','ongoing')->first();
       
   

        return view("frontend.ongoing-projects",compact("projects","setting","project"));
    }
}
