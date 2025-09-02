<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdblueSpecification;

class AdblueSpecificationController extends Controller
{
    public function index()
    {
        $data = AdblueSpecification::all();
        return view('admin.adblue_specifications.index', compact("data"));
    }

    public function create()
    {
        return view('admin.adblue_specifications.create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string',
            'priority' => 'required|string',
            // 'icon_name' => 'required|string',
            // 'description2' => 'required|string',

            // 'image' => 'required|mimes:jpg,jpeg,png,gif,webp,svg',
            // 'image2' => 'required|mimes:jpg,jpeg,png,gif,webp,svg',

        ]);
        // dd($data);

        // if ($request->hasFile('image')) {
        //     $image = 'about_' . rand() . '.' . $request->image->extension();
        //     $data['image'] = $image;
        //     $request->image->move(public_path('uploads/studyabroad/'), $image);
        // }

       
        
        AdblueSpecification::create($data);

        return redirect()->route('adblue_specifications.index')->with('success', 'New Content  Added');
    }

    public function edit($id)
    {
        $data = AdblueSpecification::findOrFail($id);
        return view('admin.adblue_specifications.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string',
            'priority' => 'required|string',
            // 'icon_name' => 'required|string',
       
        ]);

        $studyabroad = AdblueSpecification::findOrFail($id);

        // Handling image upload
        // if ($request->hasFile('image')) {
        //     if ($studyabroad->image) {
        //         $oldFilePath = public_path('uploads/studyabroad/' .  $studyabroad->image);
        //         if (file_exists($oldFilePath)) {
        //             unlink($oldFilePath);
        //         }
        //     }
        //     $image = 'study_abroad_image_1' . time() . '.' . $request->image->extension();
        //     $data['image'] = $image;
        //     $request->image->move(public_path('uploads/studyabroad'), $image);
        // }
      
     
        

        $studyabroad->update($data);
        return redirect()->route('adblue_specifications.index')->with('success', 'New Content Added');

        // return redirect()->back()->with('success', 'About Updated Successfully');
    }

    public function destroy($id)
    {
        $about = AdblueSpecification::findOrFail($id);

        // if ($about->image) {
        //     $oldFilePath = public_path('uploads/studyabroad/' . $about->image);
        //     if (file_exists($oldFilePath)) {
        //         unlink($oldFilePath);
        //     }
        // }
       

        $about->delete();
        return redirect()->back()->with('danger', 'Deleted Successfully');
    }
}
