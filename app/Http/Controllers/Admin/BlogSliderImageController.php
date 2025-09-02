<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogSliderImage;
use Illuminate\Http\Request;

class BlogSliderImageController extends Controller
{
    public function index(Request $request)
    {
        $blog_id = $request->blog_id;
        $data = BlogSliderImage::where('blog_id', $blog_id)->get();
        return view('admin.blog_slider_image.index', compact('data', 'blog_id'));
    }

    public function create(Request $request)
    {
        $blog_id = $request->blog_id;
        return view('admin.blog_slider_image.create', compact('blog_id'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'blog_id' => 'required',
            'blog_slider_image' => 'required|image|mimes:jpeg,png,jpg,webp',
        ]);

        if ($request->hasFile('blog_slider_image')) {
            $imageName = 'blog_slider_image_' . rand() . '.' . $request->blog_slider_image->extension();
            $data['blog_slider_image'] = $imageName;
            $request->blog_slider_image->move(public_path('uploads/blog_slider_image/'), $imageName);
        }

        BlogSliderImage::create($data);
        return redirect()->route('blog_slider_image.index', ['blog_id' => $request->blog_id])->with('success', 'New Blog Slider Image Added');
    }

    public function edit($id)
    {
        $data = BlogSliderImage::findOrFail($id);
        return view('admin.blog_slider_image.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'blog_slider_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $slider = BlogSliderImage::findOrFail($id);

        if ($request->hasFile('blog_slider_image')) {
            // Delete the old image if it exists
            if ($slider->blog_slider_image) {
                $oldImagePath = public_path('uploads/blog_slider_image/' . $slider->blog_slider_image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Upload the new image
            $imageName = 'blog_slider_image_' . rand() . '.' . $request->blog_slider_image->extension();
            $request->blog_slider_image->move(public_path('uploads/blog_slider_image/'), $imageName);
            $validatedData['blog_slider_image'] = $imageName;
        }

        $slider->update($validatedData);

        return redirect()->route('blog_slider_image.index', ['blog_id' => $slider->blog_id])->with('success', 'Blog Slider Image Updated Successfully');
    }

    public function destroy($id)
    {
        $slider = BlogSliderImage::findOrFail($id);

        // Delete the old image if it exists
        if ($slider->blog_slider_image) {
            $oldFilePath = public_path('uploads/blog_slider_image/' . $slider->blog_slider_image);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }

        $slider->delete();

        return redirect()->back()->with('danger', 'Blog Slider Image Deleted Successfully');
    }
}
