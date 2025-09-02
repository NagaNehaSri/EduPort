<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisionMission;
use Illuminate\Http\Request;

class VisionMissionController extends Controller
{
    public function index()
    {
        $data = VisionMission::all();
        return view('admin.vision_mission.index', compact("data"));
    }

    public function create()
    {
        return view('admin.vision_mission.create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
           
            'heading' => 'required|string',
            'description' => 'required|string',
            'icon_name'=> 'required|string',
       

        ]);

        // if ($request->hasFile('image')) {
        //     $image = 'about_' . rand() . '.' . $request->aboutpage_image->extension();
        //     $data['aboutpage_image'] = $image;
        //     $request->aboutpage_image->move(public_path('uploads/about/'), $image);
        // }
        // if ($request->hasFile('image_2')) {
        //     $image_2 = 'image2_' . rand() . '.' . $request->image_2->extension();
        //     $data['image_2'] = $image_2;
        //     $request->image_2->move(public_path('uploads/about/'), $image);
        // }
        VisionMission::create($data);

        return redirect()->route('vision_mission.index')->with('success', 'New vision mission Content Added');
    }

    public function edit($id)
    {
        $data = VisionMission::findOrFail($id);
        return view('admin.vision_mission.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            
            'heading' => 'required|string',
            'description' => 'required|string',
            // 'vision_description' => 'required|string',
            'icon_name' => 'required|string',
            // 'mission_heading' => 'required|string',
            // 'mission_description' => 'required|string',     
            // 'business_objective_heading' => 'required|string',
            // 'business_objective_description_1' => 'required|string',
            // 'business_objective_description_2' => 'required|string',
            // 'image' => 'required|mimes:jpg,jpeg,png,gif,webp,svg',
            // 'mission_image' => 'required|mimes:jpg,jpeg,png,gif,webp,svg',
            // 'vision_image' => 'required|mimes:jpg,jpeg,png,gif,webp,svg',
        ]);
    
        $vision_mission = VisionMission::findOrFail($id);
    
      
        // if ($request->hasFile('image')) {
        //     if ($vision_mission->image) {
        //         $oldFilePath = public_path('uploads/about/' . $vision_mission->image);
        //         if (file_exists($oldFilePath)) {
        //             unlink($oldFilePath);
        //         }
        //     }
        //     $image = 'vision_mission_image_' . time() . '.' . $request->image->extension();
        //     $data['image'] = $image;
        //     $request->image->move(public_path('uploads/about'), $image);
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
    
        $vision_mission->update($data);
    
        return redirect()->route('vision_mission.index')->with('success', 'New vision mission Content Added');

    }
    

    public function destroy($id)
    {
        $about = VisionMission::findOrFail($id);

        // Delete the old images if they exist
        if ($about->image) {
            $oldFilePath = public_path('uploads/about/' . $about->image);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
        if ($about->vision_image) {
            $oldFilePath = public_path('uploads/about/' . $about->vision_image);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
        if ($about->mission_image) {
            $oldFilePath = public_path('uploads/about/' . $about->experienceiconimage);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
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
