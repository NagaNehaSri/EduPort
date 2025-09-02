<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeAboutImage;
use Illuminate\Http\Request;

class HomeAboutImageController extends Controller
{
    public function index(Request $request)
    {
        $home_about_id = $request->home_about_id;
        $data = HomeAboutImage::where('home_about_id', $home_about_id)->get();
        return view('admin.home_about_image_slider.index', compact('data', 'home_about_id'));
    }

    public function create(Request $request)
    {
        $home_about_id = $request->home_about_id;
        return view('admin.home_about_image_slider.create', compact("home_about_id"));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'home_about_id' => 'required',
            'home_about_image' => 'required|image|mimes:jpeg,png,jpg,webp',
        ]);

        if ($request->hasFile('home_about_image')) {
            $imageName = 'home_about_image' . rand() . '.' . $request->home_about_image->extension();
            $data['home_about_image'] = $imageName;
            $request->home_about_image->move(public_path('uploads/home_about_image/'), $imageName);
        }

        HomeAboutImage::create($data);
        return redirect()->route('home_about_image_slider.index', ['home_about_id' => $request->home_about_id])->with('success', 'New Project Image Added');
    }

    public function edit($id)
    {
        $data = HomeAboutImage::where('id', $id)->first();
        return view('admin.home_about_image_slider.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'home_project_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $slider = HomeAboutImage::findOrFail($id);

        if ($request->hasFile('home_about_image')) {
            // Delete the old image if it exists
            if ($slider->home_about_image) {
                $oldImagePath = public_path('uploads/home_about_image/' . $slider->home_about_image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Upload the new image
            $imageName = 'home_about_image' . rand() . '.' . $request->home_about_image->extension();
            $request->home_about_image->move(public_path('uploads/home_about_image/'), $imageName);
            $validatedData['home_about_image'] = $imageName;
        }

        $slider->update($validatedData);
        // dd($slider->home_about_id);

        return redirect()->route('home_about_image_slider.index', ['home_about_id' => $slider->home_about_id])->with('success', 'New Project Image Added');
    }

    public function destroy($id)
    {
        $slider = HomeAboutImage::findOrFail($id);

        // Delete the old image if it exists
        if ($slider->home_about_image) {
            $oldFilePath = public_path('uploads/home_about_image/' . $slider->home_about_image);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }

        $slider->delete();

        return redirect()->back()->with('danger', 'Home About Slider Image Deleted Successfully');
    }
}
