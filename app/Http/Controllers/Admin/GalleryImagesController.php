<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryImages;
use Illuminate\Http\Request;

class GalleryImagesController extends Controller
{
    public function index()
    {
        // $about_id = $request->about_id;
        $data = GalleryImages::all();
        return view('admin.gallery_images.index', compact('data'));
    }

    public function create()
    {
        // $about_id = $request->about_id;
        return view('admin.gallery_images.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'priority' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp',
        ]);

        if ($request->hasFile('image')) {
            $imageName = 'image_' . rand() . '.' . $request->image->extension();
            $data['image'] = $imageName;
            $request->image->move(public_path('uploads/gallery_images/'), $imageName);
        }

        GalleryImages::create($data);
        return redirect()->route('gallery_images.index')->with('success', 'New Gallery Image Added');
    }

    public function edit($id)
    {
        $data = GalleryImages::findOrFail($id);
        return view('admin.gallery_images.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'priority' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $slider = GalleryImages::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($slider->image) {
                $oldImagePath = public_path('uploads/gallery_images/' . $slider->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $imageName = 'image_' . rand() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/gallery_images/'), $imageName);
            $validatedData['image'] = $imageName;
        }

        $slider->update($validatedData);

        return redirect()->route('gallery_images.index')->with('success', 'About Image Updated Successfully');
    }

    public function destroy($id)
    {
        $slider = GalleryImages::findOrFail($id);

     
        if ($slider->image) {
            $oldFilePath = public_path('uploads/image/' . $slider->image);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }

        $slider->delete();

        return redirect()->back()->with('danger', 'Gallery Image Deleted Successfully');
    }
}
