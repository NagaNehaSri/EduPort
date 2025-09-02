<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccreditationImage;
use Illuminate\Http\Request;

class AccreditationsImagesController extends Controller
{
    public function index(Request $request)
    {
        $accreditations_id = $request->accreditations_id;
        $data = AccreditationImage::where('accreditations_id', $accreditations_id)->get();
        return view('admin.accreditations_images.index', compact('data', 'accreditations_id'));
    }

    public function create(Request $request)
    {
        $accreditations_id = $request->accreditations_id;
        return view('admin.accreditations_images.create', compact('accreditations_id'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'accreditations_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp',
        ]);

        if ($request->hasFile('image')) {
            $imageName = 'image_' . rand() . '.' . $request->image->extension();
            $data['image'] = $imageName;
            $request->image->move(public_path('uploads/accreditations_images/'), $imageName);
        }

        AccreditationImage::create($data);
        return redirect()->route('accreditations_images.index', ['accreditations_id' => $request->accreditations_id])->with('success', 'New Accreditation Image Added');
    }

    public function edit($id)
    {
        $data = AccreditationImage::findOrFail($id);
        return view('admin.accreditations_images.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $slider = AccreditationImage::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($slider->image) {
                $oldImagePath = public_path('uploads/accreditations_images/' . $slider->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Upload the new image
            $imageName = 'image_' . rand() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/accreditations_images/'), $imageName);
            $validatedData['image'] = $imageName;
        }

        $slider->update($validatedData);

        return redirect()->route('accreditations_images.index', ['accreditations_id' => $slider->accreditations_id])->with('success', 'Accreditation Image Updated Successfully');
    }

    public function destroy($id)
    {
        $slider = AccreditationImage::findOrFail($id);

        // Delete the old image if it exists
        if ($slider->image) {
            $oldFilePath = public_path('uploads/accreditations_images/' . $slider->image);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }

        $slider->delete();

        return redirect()->back()->with('danger', 'Accreditation Image Deleted Successfully');
    }
}
