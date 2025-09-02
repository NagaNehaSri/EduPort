<?php

namespace App\Http\Controllers\frontend;

use App\Models\Banner;
use App\Models\HomeService;
use App\Models\Setting;
use App\Models\BannerFeature;
use App\Models\HomeAbout;
use App\Models\Project;
use App\Models\Count;
use App\Models\WhoWeAre;
use App\Models\HomeAboutImage;
use App\Models\AboutImage;
use App\Models\Product;
use App\Models\Cms;
use App\Models\WhyChooseUs;
use App\Models\Testimonial;
use App\Models\Blog;
use App\Models\WhyChooseUsPage;
use App\Models\CompanyProfile;
use App\Models\OurTeam;
use App\Models\Service;
use App\Models\Country;
use App\Models\WhatWeProvide;
use App\Models\HomePageEnquiry;
use App\Models\Highlight;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    
    public function index()
    {
        $banners = Banner::orderBy('priority', 'asc')->first();
        $highlights=Highlight::orderBy('priority', 'asc')->get();

        
        $bannerfeature= BannerFeature::all();
        $blogs=Blog::all();
        $settings = Setting::first();
        $counts=Count::all();
        $whoweare=WhoWeAre::all();
        $whychooseus=WhyChooseUs::all();
        $testimonials=Testimonial::all();
        $products = Product::orderBy('priority', 'asc')->get();
        $services=Service::orderBy('priority', 'asc')->get();
        $projects =Project::all();
        $homeabout=HomeAbout::first();
        $countries = Country::orderBy('id', 'desc')->limit(8)->get();
        $homeservices=HomeService::orderBy('priority', 'asc')->get();
        $whatweprovides=WhatWeProvide::all();
        $homepageenquiry=HomePageEnquiry::first();


        $home_about_images=HomeAboutImage::where("home_about_id",$homeabout->id)->get();

        


        return view("frontend.index",compact("settings","banners","homeabout","whoweare",
        "whychooseus","products","testimonials","counts","services","projects","blogs","home_about_images","bannerfeature",
    "countries","homeservices","whatweprovides","homepageenquiry","highlights"));
    }
}

