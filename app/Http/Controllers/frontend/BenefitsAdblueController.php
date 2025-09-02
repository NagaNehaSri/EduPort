<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Adblue;

use App\Models\AdblueBenefit;
use App\Models\AdblueSolutions;
use App\Models\AdblueSpecification;
use Illuminate\Http\Request;
use App\Models\Setting;
class BenefitsAdblueController extends Controller
{
    public function index()
    {


        $settings=Setting::first();
        $adblue=Adblue::first();
        $adblue_benfits=AdblueBenefit::all();
        $adblue_specifications=AdblueSpecification::orderBy('priority', 'asc')->get();
        $adblue_solutions=AdblueSolutions::orderBy('priority', 'asc')->get();

        return view("frontend.benefits-adblue",compact("settings","adblue","adblue_benfits","adblue_specifications","adblue_solutions"));
    }
}
