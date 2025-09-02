<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CEOMessage;
use Illuminate\Http\Request;

class CEOMessageController extends Controller
{
    public function index()
    {
        $data = CEOMessage::all();
        return view('admin.ceomessage.index', compact("data"));
    }

    public function create()
    {
        return view('admin.ceomessage.create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'tag' => 'required|string|max:255',
            'heading' => 'required|string',
            'designation' => 'required|string',
            // 'description' => 'required|string',
            // 'description_2' => 'required|string',
            // 'description_3' => 'required|string',

            'image' => 'required|mimes:jpg,jpeg,png,gif,webp,svg',
            // 'image_2' => 'required|mimes:jpg,jpeg,png,gif,webp,svg',

        ]);

        if ($request->hasFile('image')) {
            $image = 'about_' . rand() . '.' . $request->aboutpage_image->extension();
            $data['aboutpage_image'] = $image;
            $request->aboutpage_image->move(public_path('uploads/about/'), $image);
        }
        // if ($request->hasFile('image_2')) {
        //     $image_2 = 'image2_' . rand() . '.' . $request->image_2->extension();
        //     $data['image_2'] = $image_2;
        //     $request->image_2->move(public_path('uploads/about/'), $image);
        // }
        CEOMessage::create($data);

        return redirect()->route('ceomessage.index')->with('success', 'New HomeAbout Added');
    }

    public function edit($id)
    {
        $data = CEOMessage::findOrFail($id);
        return view('admin.ceomessage.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'tag' => 'required|string|max:255',
            'heading' => 'required|string',
            'designation' => 'required|string',
            // 'description' => 'required|string',
            // 'description_2' => 'required|string',
            // 'description_3' => 'required|string',
            'image' => 'nullable|mimes:jpg,jpeg,png,gif,webp,svg',
            // 'image_2' => 'required|mimes:jpg,jpeg,png,gif,webp,svg',
        ]);
    
        $ceomessage = CeoMessage::findOrFail($id);
    
    
        if ($request->hasFile('image')) {
            if ($ceomessage->image) {
                $oldFilePath = public_path('uploads/about/' . $ceomessage->image);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
            $image = 'ceomessage_image_' . time() . '.' . $request->image->extension();
            $data['image'] = $image;
            $request->image->move(public_path('uploads/about'), $image);
        }
    
        // Handling image_2 upload
        // if ($request->hasFile('image_2')) {
        //     if ($ceomessage->image_2) {
        //         $oldFilePath = public_path('uploads/about/' . $ceomessage->image_2);
        //         if (file_exists($oldFilePath)) {
        //             unlink($oldFilePath);
        //         }
        //     }
        //     $image_2 = 'ceomessage_image_2_' . time() . '.' . $request->image_2->extension();
        //     $data['image_2'] = $image_2;
        //     $request->image_2->move(public_path('uploads/about'), $image_2);
        // }
    
        $ceomessage->update($data);
    
        return redirect()->back()->with('success', 'About Updated Successfully');
    }
    

    public function destroy($id)
    {
        $about = CEOMessage::findOrFail($id);

        // Delete the old images if they exist
        if ($about->image) {
            $oldFilePath = public_path('uploads/about/' . $about->image);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
        if ($about->image_2) {
            $oldFilePath = public_path('uploads/about/' . $about->image_2);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
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
