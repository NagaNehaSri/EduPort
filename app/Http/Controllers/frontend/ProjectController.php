<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectImage;



use App\Models\Setting;
class ProjectController extends Controller
{
    public function index($slug)
    {
        $setting = Setting::first();

        $projects= Project::where("project_status", $slug)->get();
        
        $project= Project::where("project_status", $slug)->first();

        // $projectsongoing= Project::where('project_status','ongoing')->get();
        
        // $projectongoings= Project::where('project_status','ongoing')->first();
       
       
       
    

        return view("frontend.projects",compact("projects","setting","project"));
    }
        public function ongoing()
    {

        
        $setting = Setting::first();

        $projects= Project::where('project_status','ongoing')->get();
        
        $project= Project::where('project_status','ongoing')->first();
       
        // dd($project->project_status);

        return view("frontend.ongoing-projects",compact("projects","setting","project"));
    }
    public function upcoming()
    {
        $setting = Setting::first();

        $projects= Project::where('project_status','upcoming')->get();
        
        $project= Project::where('project_status','upcoming')->first();
        // dd($project->project_status);

    

        return view("frontend.ongoing-projects",compact("projects","setting","project"));
    }
}
