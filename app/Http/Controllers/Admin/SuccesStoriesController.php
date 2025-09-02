<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SuccessStory;
use Illuminate\Http\Request;

class SuccesStoriesController extends Controller
{
    public function index()
    {
        $data = SuccessStory::all();
        return view('admin.succes_stories.index', compact("data"));
    }

    // public function create()
    // {
    //     return view('admin.ceomessage.create');
    // }

    // public function store(Request $request)
    // {
    //     $data = $this->validate($request, [
    //         'tag' => 'required|string|max:255',
    //         'heading' => 'required|string',
    //         'description' => 'required|string',
    //         'description_2' => 'required|string',
    //         'description_3' => 'required|string',

    //         'image' => 'required|mimes:jpg,jpeg,png,gif,webp,svg',
    //         'image_2' => 'required|mimes:jpg,jpeg,png,gif,webp,svg',

    //     ]);

    //     if ($request->hasFile('image')) {
    //         $image = 'about_' . rand() . '.' . $request->aboutpage_image->extension();
    //         $data['aboutpage_image'] = $image;
    //         $request->aboutpage_image->move(public_path('uploads/about/'), $image);
    //     }
    //     if ($request->hasFile('image_2')) {
    //         $image_2 = 'image2_' . rand() . '.' . $request->image_2->extension();
    //         $data['image_2'] = $image_2;
    //         $request->image_2->move(public_path('uploads/about/'), $image);
    //     }
    //     CEOMessage::create($data);

    //     return redirect()->route('ceomessage.index')->with('success', 'New HomeAbout Added');
    // }

    public function edit($id)
    {
        $data = SuccessStory::findOrFail($id);
        return view('admin.succes_stories.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            
            'heading' => 'required|string',
            'description' => 'required|string',
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
    
        $vision_mission = SuccessStory::findOrFail($id);
    
        // Handling image upload
        if ($request->hasFile('image')) {
            if ($vision_mission->image) {
                $oldFilePath = public_path('uploads/about/' . $vision_mission->image);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
            $image = 'succes_stories_image_' . time() . '.' . $request->image->extension();
            $data['image'] = $image;
            $request->image->move(public_path('uploads/about'), $image);
        }
    
       
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
    
        return redirect()->back()->with('success', 'About Updated Successfully');
    }
    

    public function destroy($id)
    {
        $about = SuccessStory::findOrFail($id);

        // Delete the old images if they exist
        if ($about->image) {
            $oldFilePath = public_path('uploads/about/' . $about->image);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
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
