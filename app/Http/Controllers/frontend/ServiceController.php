<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceBenefit;
use App\Models\ServiceFeature;
use App\Models\ServiceImagesSlider;
use App\Models\Setting;

class ServiceController extends Controller
{
    // public function index()
    // {
    //     $setting = Setting::first();
    //     $services = Service::all();


    //     return view("frontend.services", compact("services", "setting"));
    // }
    public function view($slug)
    {
        $setting = Setting::first();

        $service = Service::where("slug", $slug)->first();
        $services = Service::all();

        $serviceimagessliders = ServiceImagesSlider::where("service_id", $service->id)->get();
        $servicefeatures=ServiceFeature::where("service_id", $service->id)->get();

        $serviceBenefits = ServiceBenefit::where("service_id", $service->id)->get();

        return view("frontend.service-view", compact("service", "setting", "serviceimagessliders", "serviceBenefits", "services","servicefeatures"));
    }
}
