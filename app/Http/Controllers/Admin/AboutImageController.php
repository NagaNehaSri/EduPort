<?php

namespace App\Http\Controllers\Admin;



use App\Http\Controllers\Controller;
use App\Models\AboutImage;
use Illuminate\Http\Request;

class AboutImageController extends Controller
{
    public function index(Request $request)
    {
        $about_id = $request->about_id;
        $data = AboutImage::where('about_id', $about_id)->get();
        return view('admin.about_image_slider.index', compact('data', 'about_id'));
    }

    public function create(Request $request)
    {
        $about_id = $request->about_id;
        return view('admin.about_image_slider.create', compact('about_id'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'about_id' => 'required',
            'about_image' => 'required|image|mimes:jpeg,png,jpg,webp',
        ]);

        if ($request->hasFile('about_image')) {
            $imageName = 'about_image_' . rand() . '.' . $request->about_image->extension();
            $data['about_image'] = $imageName;
            $request->about_image->move(public_path('uploads/about_image/'), $imageName);
        }

        AboutImage::create($data);
        return redirect()->route('about_image_slider.index', ['about_id' => $request->about_id])->with('success', 'New About Image Added');
    }

    public function edit($id)
    {
        $data = AboutImage::findOrFail($id);
        return view('admin.about_image_slider.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'about_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $slider = AboutImage::findOrFail($id);

        if ($request->hasFile('about_image')) {
            // Delete the old image if it exists
            if ($slider->about_image) {
                $oldImagePath = public_path('uploads/about_image/' . $slider->about_image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Upload the new image
            $imageName = 'about_image_' . rand() . '.' . $request->about_image->extension();
            $request->about_image->move(public_path('uploads/about_image/'), $imageName);
            $validatedData['about_image'] = $imageName;
        }

        $slider->update($validatedData);

        return redirect()->route('about_image_slider.index', ['about_id' => $slider->about_id])->with('success', 'About Image Updated Successfully');
    }

    public function destroy($id)
    {
        $slider = AboutImage::findOrFail($id);

        // Delete the old image if it exists
        if ($slider->about_image) {
            $oldFilePath = public_path('uploads/about_image/' . $slider->about_image);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }

        $slider->delete();

        return redirect()->back()->with('danger', 'About Image Deleted Successfully');
    }
}

