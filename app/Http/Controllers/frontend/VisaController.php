<?php

namespace App\Http\Controllers\frontend;

use App\Models\Setting;
use App\Models\Visa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VisaController extends Controller
{
    public function index($slug)
    {

        $setting = Setting::first();
        $visa = Visa::where('slug', $slug)->first();

        return view("frontend.visa", compact("setting","visa"));
    }

   
}
