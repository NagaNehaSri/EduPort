<?php

namespace App\Http\Controllers\Admin;

use App\Models\BannerFeature;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannerFeatureController extends Controller
{
    public function index()
    {
        $data = BannerFeature::all();
        return view('admin.banner_feature.index', compact("data"));
    }

    public function create()
    {
        return view('admin.banner_feature.create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            
            'bannerfeaturetext' => 'required',
        
        ]);

        BannerFeature::create($data);

        return redirect()->route('banner_feature.index')->with('success', 'New Banner Feature Added');
    }

    public function edit($id)
    {
        $data = BannerFeature::where('id', $id)->first();
        return view('admin.banner_feature.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'bannerfeaturetext' => 'required',
           
        ]);

        $bannerFeature = BannerFeature::find($id);
        $bannerFeature->update($data);

        // return redirect()->back()->with('primary', 'Banner Feature Updated Successfully');
         return redirect()->route('banner_feature.index')->with('primary', 'Banner Feature Updated Successfully');
    }

    function destroy($id)
    {
        $bannerFeature = BannerFeature::findOrFail($id);
        $bannerFeature->delete();
        return redirect()->back()->with('danger', 'Banner Feature Deleted Successfully');
    }
}
