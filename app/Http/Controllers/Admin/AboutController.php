<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class AboutController extends Controller
{
    public function index()
    {
        $data = About::all();
        return view('admin.about.index', compact("data"));
    }

    public function create()
    {
        return view('admin.about.create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'tag' => 'required|string|max:255',
            'heading' => 'required|string',
            'about_nexus' => 'required|string',
            'experienceiconimage' => 'required|string',
            'experience_text' => 'required|string',
            'about_nexus_description_1' => 'required|string',
            'about_nexus_description_2' => 'required|string',
            'aboutpage_description' => 'required|string',
            'aboutpage_image' => 'required|mimes:jpg,jpeg,png,gif',
            'about_nexus_image' => 'required|mimes:jpg,jpeg,png,gif',
        ]);

        if ($request->hasFile('aboutpage_image')) {
            $image = 'about_' . rand() . '.' . $request->aboutpage_image->extension();
            $data['aboutpage_image'] = $image;
            $request->aboutpage_image->move(public_path('uploads/'), $image);
        }

        About::create($data);

        return redirect()->route('about.index')->with('success', 'New HomeAbout Added');
    }

    public function edit($id)
    {
        $data = About::findOrFail($id);
        return view('admin.about.edit', compact('data'));
    }

    // public function update(Request $request, $id)
    // {
    //     $data = $this->validate($request, [
    //       'tag' => 'required|string|max:255',
    //         'heading' => 'required|string',
    //         // 'about_nexus' => 'required|string',
    //         // 'experienceiconimage' => 'required|string',
    //         // 'experience_text' => 'required|string',
    //         // 'about_nexus_description_1' => 'required|string',
    //         // 'about_nexus_description_2' => 'required|string',
    //         'aboutpage_description' => 'required|string',
    //         'aboutpage_image' => 'nullable|mimes:jpg,jpeg,png,gif',
    //         'aboutpage_image_2' => 'nullable|mimes:jpg,jpeg,png,gif',
    //         'aboutpage_image_3' => 'nullable|mimes:jpg,jpeg,png,gif',
    //         // 'about_nexus_image' => 'required|mimes:jpg,jpeg,png,gif',
    //     ]);

    //     $about = About::findOrFail($id);

    //     // Handle file uploads and update the request data
    //     if ($request->hasFile('aboutpage_image')) {
    //         if ($about->aboutpage_image) {
    //             $oldFilePath = public_path('uploads/about/' . $about->aboutpage_image);
    //             if (file_exists($oldFilePath)) {
    //                 unlink($oldFilePath);
    //             }
    //         }
    //         $aboutpage_image = 'aboutpage_image_' . time() . '.' . $request->aboutpage_image->extension();
    //         $data['aboutpage_image'] = $aboutpage_image;
    //         $request->aboutpage_image->move(public_path('uploads/about'), $aboutpage_image);
    //     }
    //     if ($request->hasFile('aboutpage_image_2')) {
    //         if ($about->aboutpage_image_2) {
    //             $oldFilePath = public_path('uploads/about/' . $about->aboutpage_image_2);
    //             if (file_exists($oldFilePath)) {
    //                 unlink($oldFilePath);
    //             }
    //         }
    //         $aboutpage_image_2 = 'aboutpage_image_2' . time() . '.' . $request->aboutpage_image_2->extension();
    //         $data['aboutpage_image_2'] = $aboutpage_image_2;
    //         $request->aboutpage_image_2->move(public_path('uploads/about'), $aboutpage_image_2);
    //     }
    //     if ($request->hasFile('aboutpage_image_3')) {
    //         if ($about->aboutpage_image_3) {
    //             $oldFilePath = public_path('uploads/about/' . $about->aboutpage_image_3);
    //             if (file_exists($oldFilePath)) {
    //                 unlink($oldFilePath);
    //             }
    //         }
    //         $aboutpage_image_3 = 'aboutpage_image_3' . time() . '.' . $request->aboutpage_image_3->extension();
    //         $data['aboutpage_image_3'] = $aboutpage_image_3;
    //         $request->aboutpage_image_3->move(public_path('uploads/about'), $aboutpage_image_3);
    //     }
    //     // if ($request->hasFile('about_nexus_image')) {
    //     //     if ($about->about_nexus_image) {
    //     //         $oldFilePath = public_path('uploads/about/' . $about->about_nexus_image);
    //     //         if (file_exists($oldFilePath)) {
    //     //             unlink($oldFilePath);
    //     //         }
    //     //     }
    //     //     $about_nexus_image = 'about_nexus_image_' . time() . '.' . $request->about_nexus_image->extension();
    //     //     $data['about_nexus_image'] = $about_nexus_image;
    //     //     $request->about_nexus_image->move(public_path('uploads/about'), $about_nexus_image);
    //     // }
    //     // if ($request->hasFile('experienceiconimage')) {
    //     //     if ($about->experienceiconimage) {
    //     //         $oldFilePath = public_path('uploads/about/' . $about->experienceiconimage);
    //     //         if (file_exists($oldFilePath)) {
    //     //             unlink($oldFilePath);
    //     //         }
    //     //     }
    //     //     $experienceiconimage = 'experienceiconimage_' . time() . '.' . $request->experienceiconimage->extension();
    //     //     $data['experienceiconimage'] = $experienceiconimage;
    //     //     $request->experienceiconimage->move(public_path('uploads/about'), $experienceiconimage);
    //     // }
    //     // if ($request->hasFile('vision_icon_image')) {
    //     //     if ($about->vision_icon_image) {
    //     //         $oldFilePath = public_path('uploads/about/' . $about->vision_icon_image);
    //     //         if (file_exists($oldFilePath)) {
    //     //             unlink($oldFilePath);
    //     //         }
    //     //     }
    //     //     $vision_icon_image = 'vision_icon_image_' . time() . '.' . $request->vision_icon_image->extension();
    //     //     $data['vision_icon_image'] = $vision_icon_image;
    //     //     $request->vision_icon_image->move(public_path('uploads/about'), $vision_icon_image);
    //     // }
    //     // if ($request->hasFile('mission_icon_image')) {
    //     //     if ($about->mission_icon_image) {
    //     //         $oldFilePath = public_path('uploads/about/' . $about->mission_icon_image);
    //     //         if (file_exists($oldFilePath)) {
    //     //             unlink($oldFilePath);
    //     //         }
    //     //     }
    //     //     $mission_icon_image = 'mission_icon_image_' . time() . '.' . $request->mission_icon_image->extension();
    //     //     $data['mission_icon_image'] = $mission_icon_image;
    //     //     $request->mission_icon_image->move(public_path('uploads/about'), $mission_icon_image);
    //     // }

    //     $about->update($data);

    //     return redirect()->back()->with('success', 'About Updated Successfully');
    // }
    public function update(Request $request, $id)
{
    $data = $this->validate($request, [
        'tag' => 'required|string|max:255',
        'heading' => 'required|string',
        'aboutpage_description' => 'required|string',
        'aboutpage_image' => 'nullable|mimes:jpg,jpeg,png,gif',
        'aboutpage_image_2' => 'nullable|mimes:jpg,jpeg,png,gif',
        'aboutpage_image_3' => 'nullable|mimes:jpg,jpeg,png,gif',
    ]);

    $about = About::findOrFail($id);

    // Upload aboutpage_image
    if ($request->hasFile('aboutpage_image')) {
        if ($about->aboutpage_image) {
            $oldFilePath = public_path('uploads/about/' . $about->aboutpage_image);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
        $filename = 'aboutpage_image_' . time() . '.' . $request->aboutpage_image->extension();
        $request->aboutpage_image->move(public_path('uploads/about'), $filename);
        $data['aboutpage_image'] = $filename;
    } else {
        $data['aboutpage_image'] = $about->aboutpage_image ?? null;
    }

    // Upload aboutpage_image_2
    if ($request->hasFile('aboutpage_image_2')) {
        if ($about->aboutpage_image_2) {
            $oldFilePath = public_path('uploads/about/' . $about->aboutpage_image_2);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
        $filename2 = 'aboutpage_image_2_' . time() . '.' . $request->aboutpage_image_2->extension();
        $request->aboutpage_image_2->move(public_path('uploads/about'), $filename2);
        $data['aboutpage_image_2'] = $filename2;
    } else {
        $data['aboutpage_image_2'] = $about->aboutpage_image_2 ?? null;
    }

    // Upload aboutpage_image_3
    if ($request->hasFile('aboutpage_image_3')) {
        if ($about->aboutpage_image_3) {
            $oldFilePath = public_path('uploads/about/' . $about->aboutpage_image_3);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
        $filename3 = 'aboutpage_image_3_' . time() . '.' . $request->aboutpage_image_3->extension();
        $request->aboutpage_image_3->move(public_path('uploads/about'), $filename3);
        $data['aboutpage_image_3'] = $filename3;
    } else {
        $data['aboutpage_image_3'] = $about->aboutpage_image_3 ?? null;
    }

    // Update database
    $about->update($data);

    return redirect()->back()->with('success', 'About Updated Successfully');
}


    public function destroy($id)
    {
        $about = About::findOrFail($id);

        // Delete the old images if they exist
        if ($about->aboutpage_image) {
            $oldFilePath = public_path('uploads/about/' . $about->aboutpage_image);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
        if ($about->vision_image) {
            $oldFilePath = public_path('uploads/about/' . $about->about_nexus_image);
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
