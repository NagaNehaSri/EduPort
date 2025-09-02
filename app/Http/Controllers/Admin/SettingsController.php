<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function edit($id)
    {
        $data = Setting::find($id);

        return view('admin.settings.general_settings.edit', compact('data'));
    }

    public function update(Request $request, $id)
    
    {
   
        $requestData = $this->validate($request, [
            'site_name' => 'required',
            'address' => 'required',
            'description' => 'required',
            'iframe' => 'required',
            'iframe2' => 'nullable',
            'mobile' => 'nullable',
            'mobile2' => 'nullable',
            'email' => 'nullable|email',
            'email2' => 'nullable|email',
            'site_name_option'=>'required',
        ]);

        if ($request->logo) {
            $logo = 'logo_' . uniqid() . '.' . $request->logo->extension();
            $requestData['logo'] = $logo;
            $request->logo->move(public_path('site_settings'), $logo);
            
            
        }
        if ($request->favicon) {
            $favicon = 'favicon_' . uniqid() . '.' . $request->favicon->extension();
            $requestData['favicon'] = $favicon;
            $request->favicon->move(public_path('site_settings'), $favicon);
        }
        if ($request->footer_logo) {
            $footer_logo = 'footer_logo_' . uniqid() . '.' . $request->footer_logo->extension();
            $requestData['footer_logo'] = $footer_logo;
            $request->footer_logo->move(public_path('site_settings'), $footer_logo);
        }
        if ($request->home_page_banner) {
            $home_page_banner = 'home_page_banner_' . uniqid() . '.' . $request->home_page_banner->extension();
            $requestData['home_page_banner'] = $home_page_banner;
            $request->home_page_banner->move(public_path('site_settings'), $home_page_banner);
        }
        if ($request->header_image) {
            $header_image = 'header_image_' . uniqid() . '.' . $request->header_image->extension();
            $requestData['header_image'] = $header_image;
            $request->header_image->move(public_path('site_settings'), $header_image);
        }

        Setting::find($id)->update($requestData);
        return redirect()->back()->with('success', 'Site Settings Updated Successfully');
    }
}
