<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WhatWeProvide;

class WhatWeProvideController extends Controller
{
   
    public function index()
    {
        $data = WhatWeProvide::all();
        return view('admin.what_we_provide.index', compact('data'));
    }

    
    public function create()
    {
        return view('admin.what_we_provide.create');
    }

   
    public function store(Request $request)
    {
        $data = $request->validate([
            // 'image' => 'required|mimes:jpg,jpeg,png',
            'title' => 'required|string',
            'short_description' => 'required|string',
            'icon_name' => 'required|string',
         
        ]);

        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $imageName = time() . '_what_we_do.' . $image->getClientOriginalExtension();
        //     $imagePath = public_path('/uploads/what_we_provide/');
        //     $image->move($imagePath, $imageName);
        //     $data['image'] = $imageName;
        // }

        WhatWeProvide::create($data);
        return redirect()->route('what_we_provide.index')->with('success', 'Created Successfully');
    }

     public function edit($id)
    {
        $data = WhatWeProvide::findOrFail($id);
        return view('admin.what_we_provide.edit', compact('data'));
    }

  
    public function update(Request $request, $id)
    {
        $whoWeAre = WhatWeProvide::findOrFail($id);

        $data = $request->validate([
            // 'image' => 'required|mimes:jpg,jpeg,png',
            'title' => 'required|string',
            'short_description' => 'required|string',
            'icon_name' => 'required|string',
         
        ]);

        // if ($request->hasFile('image')) {
        //     $oldImagePath = public_path('uploads/whar_we_do/' . $whoWeAre->image);
        //     if (file_exists($oldImagePath)) {
        //         unlink($oldImagePath);
        //     }

        //     $image = $request->file('image');
        //     $imageName = time() . '_whar_we_provide.' . $image->getClientOriginalExtension();
        //     $imagePath = public_path('/uploads/what_we_provide/');
        //     $image->move($imagePath, $imageName);
        //     $data['image'] = $imageName;
        // }

        $whoWeAre->update($data);
        return redirect()->route('what_we_provide.index')->with('success', 'Updated Successfully');
    }


    public function destroy($id)
    {
        $whoWeAre = WhatWeProvide::findOrFail($id);
        $imagePath = public_path('uploads/what_we_provide/' . $whoWeAre->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $whoWeAre->delete();
        return redirect()->back()->with('danger', 'Deleted Successfully');
       
    }
}
