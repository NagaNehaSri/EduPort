<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Setting;
use App\Models\SuccessStory;
use App\models\SuccessStorySpec;


use App\Models\Team;


class SuccesStoriesController extends Controller
{
    public function index()
    {
       

        $settings=Setting::first();

        $teams=Team::all();
        $successstory=successstory::first();
        $successstoryspec=SuccessStorySpec::all();
   
        return view("frontend.succes-stories",compact("successstory","settings","successstoryspec"));
    }
}
