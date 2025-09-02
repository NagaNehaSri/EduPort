<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdblueBenefit;

class AdblueBenefitController extends Controller
{
    public function index()
    {
        $data = AdblueBenefit::all();
        return view('admin.adblue_benefits.index', compact("data"));
    }

    public function create()
    {
        return view('admin.adblue_benefits.create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'nullable|string',
            'description' => 'nullable|string',
            'icon_name' => 'nullable|string',
          
            // 'description2' => 'required|string',

            // 'image' => 'required|mimes:jpg,jpeg,png,gif,webp,svg',
            // 'image2' => 'required|mimes:jpg,jpeg,png,gif,webp,svg',

        ]);
        // dd( $data );

        // if ($request->hasFile('image')) {
        //     $image = 'about_' . rand() . '.' . $request->image->extension();
        //     $data['image'] = $image;
        //     $request->image->move(public_path('uploads/studyabroad/'), $image);
        // }

       
        
        AdblueBenefit::create($data);

        return redirect()->route('adblue_benefits.index')->with('success', 'New Content Added');
    }

    public function edit($id)
    {
        $data = AdblueBenefit::findOrFail($id);
        return view('admin.adblue_benefits.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'name' => 'required|string',
            'description' => 'required|string',
            'icon_name' => 'required|string',
       
        ]);
        // dd( $data);

        $studyabroad = AdblueBenefit::findOrFail($id);

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
        return redirect()->route('adblue_benefits.index')->with('success', 'Content Updated');

        // return redirect()->back()->with('success', 'About Updated Successfully');
    }

    public function destroy($id)
    {
        $about = AdblueBenefit::findOrFail($id);

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
