<?php

namespace App\Http\Controllers\Admin;

use App\Models\ServiceImagesSlider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceImageSliderController extends Controller
{
    public function index(Request $request)
    {
        $service_id = $request->service_id;
        $data = ServiceImagesSlider::where('service_id', $service_id)->get();
        return view('admin.service_images_slider.index', compact('data', 'service_id'));
    }

    public function create(Request $request)
    {
        $service_id = $request->service_id;
        return view('admin.service_images_slider.create', compact("service_id"));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'service_id' => 'required',
            'images' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('images')) {
            $imageName = 'images' . rand() . '.' . $request->images->extension();
            $data['images'] = $imageName;
            $request->images->move(public_path('uploads/service_images_slider/'), $imageName);
        }

        ServiceImagesSlider::create($data);
        return redirect()->route('service_images_slider.index', ['service_id' => $request->service_id])->with('success', 'New Service Slider Image Added');
    }

    public function edit($id)
    {
        $data = ServiceImagesSlider::where('id', $id)->first();
        return view('admin.service_images_slider.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'images' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $slider = ServiceImagesSlider::findOrFail($id);

        if ($request->hasFile('images')) {
            // Delete the old image if it exists
            if ($slider->images) {
                $oldImagePath = public_path('uploads/service_images_slider/' . $slider->images);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Upload the new image
            $imageName = 'images' . rand() . '.' . $request->images->extension();
            $request->images->move(public_path('uploads/service_images_slider/'), $imageName);
            $data['images'] = $imageName;
        }

        $slider->update($data);

        return redirect()->route('service_images_slider.index', ['service_id' => $slider->service_id])->with('primary', 'Service Slider Image Updated Successfully');
    }

    public function destroy($id)
    {
        $slider = ServiceImagesSlider::findOrFail($id);

        // Delete the old image if it exists
        if ($slider->images) {
            $oldFilePath = public_path('uploads/service_images_slider/' . $slider->images);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }

        $slider->delete();

        return redirect()->back()->with('danger', 'Service Slider Image Deleted Successfully');
    }
}
