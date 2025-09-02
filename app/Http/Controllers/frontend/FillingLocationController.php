<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\FillingStationLocations;
use App\Models\FillingStationLocationNames;
use App\Models\Setting;

class FillingLocationController extends Controller
{
    public function index()
    {


        $settings=Setting::first();
        $fillingstations=FillingStationLocations::orderBy('priority', 'asc')->get();
        $fillingstationlocations=FillingStationLocationNames::orderBy('priority', 'asc')->get();
  
        return view("frontend.filling-location",compact("settings","fillingstations","fillingstationlocations"));
    }
}
