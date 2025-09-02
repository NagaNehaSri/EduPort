<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Adblue;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdblueController extends Controller
{
    public function index()
    {
        $data = Adblue::all();
        return view('admin.adblue.index', compact("data"));
    }

    public function create()
    {
        return view('admin.adblue.create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'heading' => 'required|string',
            'description' => 'required|string',
            // 'description2' => 'required|string',

            'image' => 'required|mimes:jpg,jpeg,png,gif,webp,svg',
            // 'image2' => 'required|mimes:jpg,jpeg,png,gif,webp,svg',

        ]);

        if ($request->hasFile('image')) {
            $image = 'about_' . rand() . '.' . $request->image->extension();
            $data['image'] = $image;
            $request->image->move(public_path('uploads/studyabroad/'), $image);
        }

        $data['heading'] = strip_tags($request->heading);
        $data['slug'] = Str::slug($data['heading'], '-');
        
        Adblue::create($data);

        return redirect()->route('adblue.index')->with('success', 'New Study Abraod Info Added');
    }

    public function edit($id)
    {
        $data = Adblue::findOrFail($id);
        return view('admin.adblue.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [

            'heading' => 'required|string',
            'description' => 'required|string',
            // 'description2' => 'required|string',
            // 'image' => 'required|mimes:jpg,jpeg,png,gif,webp,svg',
            // 'image2' => 'required|mimes:jpg,jpeg,png,gif,webp,svg',
            // 'vision_description' => 'required|string',
            // 'vision_heading' => 'required|string',
            // 'mission_heading' => 'required|string',
            // 'mission_description' => 'required|string',     
            // 'business_objective_heading' => 'required|string',
            // 'business_objective_description_1' => 'required|string',
            // 'business_objective_description_2' => 'required|string',
            // 'image' => 'required|mimes:jpg,jpeg,png,gif,webp,svg',
            // 'mission_image' => 'required|mimes:jpg,jpeg,png,gif,webp,svg',
            // 'vision_image' => 'required|mimes:jpg,jpeg,png,gif,webp,svg',
        ]);

        $studyabroad = Adblue::findOrFail($id);

        // Handling image upload
        if ($request->hasFile('image')) {
            if ($studyabroad->image) {
                $oldFilePath = public_path('uploads/studyabroad/' .  $studyabroad->image);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
            $image = 'study_abroad_image_1' . time() . '.' . $request->image->extension();
            $data['image'] = $image;
            $request->image->move(public_path('uploads/studyabroad'), $image);
        }
        // if ($request->hasFile('image2')) {
        //     if ( $studyabroad->image2) {
        //         $oldFilePath = public_path('uploads/studyabroad/' .  $studyabroad->image2);
        //         if (file_exists($oldFilePath)) {
        //             unlink($oldFilePath);
        //         }
        //     }
        //     $image2 = 'study_abroad_image_2' . time() . '.' . $request->image2->extension();
        //     $data['image2'] = $image2;
        //     $request->image2->move(public_path('uploads/studyabroad'), $image2);
        // }


        // if ($request->hasFile('mission_image')) {
        //     if ($vision_mission->mission_image) {
        //         $oldFilePath = public_path('uploads/about/' . $vision_mission->mission_image);
        //         if (file_exists($oldFilePath)) {
        //             unlink($oldFilePath);
        //         }
        //     }
        //     $mission_image = 'mission_image_' . time() . '.' . $request->mission_image->extension();
        //     $data['mission_image'] = $mission_image;
        //     $request->mission_image->move(public_path('uploads/about'), $mission_image);
        // }

        // if ($request->hasFile('vision_image')) {
        //     if ($vision_mission->vision_image) {
        //         $oldFilePath = public_path('uploads/about/' . $vision_mission->vision_image);
        //         if (file_exists($oldFilePath)) {
        //             unlink($oldFilePath);
        //         }
        //     }
        //     $vision_image = 'vision_image_' . time() . '.' . $request->vision_image->extension();
        //     $data['vision_image'] = $vision_image;
        //     $request->vision_image->move(public_path('uploads/about'), $vision_image);
        // }
        $data['heading'] = strip_tags($request->heading);
        $data['slug'] = Str::slug($data['heading'], '-');
        

        $studyabroad->update($data);
        // return redirect()->route('studyabroad.index')->with('success', 'Up Study Abraod Info Added');

        return redirect()->back()->with('success', 'About Updated Successfully');
    }

    public function destroy($id)
    {
        $about = Adblue::findOrFail($id);

        // Delete the old images if they exist
        if ($about->image) {
            $oldFilePath = public_path('uploads/studyabroad/' . $about->image);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
        // if ($about->image2) {
        //     $oldFilePath = public_path('uploads/studyabroad/' . $about->image2);
        //     if (file_exists($oldFilePath)) {
        //         unlink($oldFilePath);
        //     }
        // }
        // if ($about->vision_image) {
        //     $oldFilePath = public_path('uploads/about/' . $about->vision_image);
        //     if (file_exists($oldFilePath)) {
        //         unlink($oldFilePath);
        //     }
        // }
        // if ($about->mission_image) {
        //     $oldFilePath = public_path('uploads/about/' . $about->experienceiconimage);
        //     if (file_exists($oldFilePath)) {
        //         unlink($oldFilePath);
        //     }
        // }
        // if ($about->vision_icon_image) {
        //     $oldFilePath = public_path('uploads/about/' . $about->vision_icon_image);
        //     if (file_exists($oldFilePath)) {
        //         unlink($oldFilePath);
        //     }
        // }
        // if ($about->mission_icon_image) {
        //     $oldFilePath = public_path('uploads/about/' . $about->mission_icon_image);
        //     if (file_exists($oldFilePath)) {
        //         unlink($oldFilePath);
        //     }
        // }

        $about->delete();
        return redirect()->back()->with('danger', 'Deleted Successfully');
    }
}
