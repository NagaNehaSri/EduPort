<?php

namespace App\Http\Controllers\frontend;

use App\Models\Blog;
use App\Models\Setting;
use App\Models\BlogSlider;
use App\Models\BlogSliderImage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class BlogController extends Controller
{
    public function index()
    {

        $setting = Setting::first();
        $blogs = Blog::latest()->paginate(6);
        return view("frontend.blog", compact("setting","blogs"));
    }

    public function view($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        $setting = Setting::first();

        $blogsliders = BlogSliderImage::where("blog_id",$blog->id)->get();

        if ($blog) {
            $recent_blogs = Blog::where('id', '!=', $blog->id) 
                            ->limit(6)
                            ->latest()
                            ->get();
        } else {
            $recent_blogs = Blog::limit(3)
                            ->latest()
                            ->get();
        }
        
        return view("frontend.blog-view",compact("blog","recent_blogs","setting","blogsliders"));
    }
}
