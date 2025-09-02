<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $data = Banner::all();
        return view('admin.banner.index', compact("data"));
    }
    //
    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
           
            'heading' => 'required',
            'description' => 'required',
            'priority'=> 'required',
            
            // 'background_image' => 'nullable|mimes:jpg,jpeg,png',
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('image')) {
            $image = 'banner' . rand() . '.' . $request->image->extension();
            $data['image'] = $image;
           
            $request->image->move(public_path('uploads/banners/'), $image);
        }
        // if ($request->hasFile('background_image')) {
        //     $background_image = 'background' . rand() . '.' . $request->background_image->extension();
        //     $data['background_image'] = $background_image;
           
        //     $request->background_image->move(public_path('uploads/banners/'), $background_image);
        // }

        Banner::create($data);

        return redirect()->back('')->with('success', 'New Banner Added');
    }

    public function edit($id)
    {
        $data = Banner::where('id', $id)->first();
        return view('admin.banner.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
          
            'heading' => 'required',
            'description' => 'required',
           'priority'=> 'required',
            

        ]);

        $banner = Banner::find($id);

        if ($request->hasFile('image')) {
            

           
            
            $image = 'banner' . rand() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/banners/'), $image);

        
            
             $data['image'] = $image;
          
             
        }

        // if ($request->hasFile('background_image')) {
            

     
        //     $background_image = 'background' . rand() . '.' . $request->background_image->extension();
        //     $request->background_image->move(public_path('uploads/banners/'), $background_image);

     
        //      $data['background_image'] = $background_image;
     
        // }
       
        $banner->update($data);
        // return redirect()->back()->with('primary', 'Banner Updated Successfully');
        return redirect()->back()->with('primary', 'Banner Updated Successfully');
    }
    function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        // Delete the old video file if it exists
        if ($banner->image) {
            $oldFilePath = public_path('uploads/banners/' . $banner->image);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
        if ($banner->background_image) {
            $oldFilePath = public_path('uploads/banners/' . $banner->background_image);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
        $banner->delete();
        return redirect()->back()->with('danger', 'Banner Deleted Successfully');
    }
}
