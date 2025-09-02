<?php

namespace App\Http\Controllers\Admin;

use App\Models\ResortBanner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResortBannerController extends Controller
{
    public function index()
    {
        $data = ResortBanner::all();
        return view('admin.resortbanner.index', compact("data"));
    }
    //
    public function create()
    {
        return view('admin.resortbanner.create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
           
            'heading' => 'required',
           
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('image')) {
            $image = 'resortbanner' . rand() . '.' . $request->image->extension();
            $data['image'] = $image;
            //dd($data['image']);
            $request->image->move(public_path('uploads/banners/'), $image);
        }

        ResortBanner::create($data);

        return redirect()->route('resortbanner.index')->with('success', 'New ResortBanner Added');
    }

    public function edit($id)
    {
        $data = ResortBanner::where('id', $id)->first();
        return view('admin.resortbanner.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
          
            'heading' => 'required',

        ]);

        $resortbanner = ResortBanner::find($id);

        if ($request->hasFile('image')) {
            

            // Upload the new video file
            $image = 'resortbanner' . rand() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/banners/'), $image);

            // Update the resortbanner with the new video file
             $data['image'] = $image;
            // $resortbanner->update(['image' => $image]);
        }
       
        $resortbanner->update($data);
        return redirect()->route('resortbanner.index')->with('primary', 'ResortBanner Updated Successfully');
    }
    function destroy($id)
    {
        $resortbanner = ResortBanner::findOrFail($id);
        // Delete the old video file if it exists
        if ($resortbanner->image) {
            $oldFilePath = public_path('uploads/banners/' . $resortbanner->image);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
        $resortbanner->delete();
        return redirect()->back()->with('danger', 'ResortBanner Deleted Successfully');
    }
}
