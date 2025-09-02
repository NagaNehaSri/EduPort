<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GalleryImages;
use App\Models\Setting;

class GalleryController extends Controller
{
    public function index()
    {
       

        $settings=Setting::first();
        $galleryimages=GalleryImages::orderBy('priority', 'asc')->get();

   
        return view("frontend.certificate",compact("settings","galleryimages"));
    }
}
