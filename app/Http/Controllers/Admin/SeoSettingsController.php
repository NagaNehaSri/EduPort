<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoSetting;
use Illuminate\Http\Request;

class SeoSettingsController extends Controller
{
    public function index()
    {
        $seo_data = SeoSetting::get();
        return view('admin.settings.seo_settings.index', compact('seo_data'));
    }

    public function create()
    {
        return view('admin.settings.seo_settings.create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'page_name' => 'required',
            'title' => 'required',
            'keywords' => 'nullable',
            'description' => 'nullable',
        ]);
        $data['og_title'] = $request->og_title;
        $data['og_description'] = $request->og_description;
        $data['twitter_title'] = $request->twitter_title;
        $data['twitter_description'] = $request->twitter_description;
        if ($request->og_image) {
            $og_image = 'og_image.' . $request->og_image->extension();
            $data['og_image'] = $og_image;
            $request->og_image->move(public_path('site_settings'), $og_image);
        }
        if ($request->twitter_image) {
            $twitter_image = 'twitter_image.'. $request->twitter_image->extension();
            $data['twitter_image'] = $twitter_image;
            $request->twitter_image->move(public_path('site_settings'), $twitter_image);
        }

        SeoSetting::create($data);

        return redirect()->route('seo-settings.index')->with('success', 'New Page SEO Settings Added');
    }

    public function edit($id)
    {
        $data = SeoSetting::find($id)->first();
        return view('admin.settings.seo_settings.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'page_name' => 'required',
            'title' => 'required',
            'keywords' => 'nullable',
            'description' => 'nullable',
        ]);
        $data['og_title'] = $request->og_title;
        $data['og_description'] = $request->og_description;
        $data['twitter_title'] = $request->twitter_title;
        $data['twitter_description'] = $request->twitter_description;
        if ($request->og_image) {
            $og_image = 'og_image.' . $request->og_image->extension();
            $data['og_image'] = $og_image;
            $request->og_image->move(public_path('site_settings'), $og_image);
        }
        if ($request->twitter_image) {
            $twitter_image = 'twitter_image.'. $request->twitter_image->extension();
            $data['twitter_image'] = $twitter_image;
            $request->twitter_image->move(public_path('site_settings'), $twitter_image);
        }

        SeoSetting::find($id)->update($data);

        return redirect()->route('seo-settings.index')->with('success', 'SEO Settings Updated');
        // return redirect()->back()->with('success', 'SEO Settings Updated Successfully');

    }

    public function destroy($id)
    {
        $result = SeoSetting::find($id)->delete();

        if ($result->og_image) {
            $oldHeaderPath = public_path('site_settings/' . $result->og_image);
            if (file_exists($oldHeaderPath)) {
              unlink($oldHeaderPath);
            }
          }
      
          if ($result->twitter_image) {
            $oldHeaderPath = public_path('site_settings/' . $result->twitter_image);
            if (file_exists($oldHeaderPath)) {
              unlink($oldHeaderPath);
            }
          }

        if ($result) {
            return redirect()->route('seo-settings.index')->with('success', 'SEO Setting Deleted Successfully');
        } else {
            return redirect()->route('seo-settings.index')->with('danger', 'No SEO Setting Deleted');
        }
    }
}
