<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\Setting;
class ProjectViewController extends Controller
{
    public function index($slug)
    {
        $setting = Setting::first();

        $projects = Project::where("slug",$slug)->first();
      

        $project_images=ProjectImage::where("project_id",$projects->id)->get();


        return view("frontend.Project-view",compact("projects","setting","project_images"));
    }
}
