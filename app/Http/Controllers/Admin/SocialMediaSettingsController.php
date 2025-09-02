<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SocialMediaSettingsController extends Controller
{
    public function edit($id)
    {
        $data = Setting::find($id);
        return view('admin.settings.sm_settings.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        Setting::find($id)->update($request->all());

        return redirect()->back()->with('success', 'Social Media Updated Successfully :)');
    }
}
