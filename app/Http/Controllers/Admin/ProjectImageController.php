<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectImage;
use Illuminate\Http\Request;

class ProjectImageController extends Controller
{
    public function index(Request $request)
    {
        $project_id = $request->project_id;
        $data = ProjectImage::where('project_id', $project_id)->get();
        return view('admin.project_images.index', compact('data', 'project_id'));
    }

    public function create(Request $request)
    {
        $project_id = $request->project_id;
        return view('admin.project_images.create', compact("project_id"));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'project_id' => 'required',
            'project_image' => 'required|image|mimes:jpeg,png,jpg,webp',
        ]);

        if ($request->hasFile('project_image')) {
            $imageName = 'project_image' . rand() . '.' . $request->project_image->extension();
            $data['project_image'] = $imageName;
            $request->project_image->move(public_path('uploads/project_image/'), $imageName);
        }

        ProjectImage::create($data);
        return redirect()->route('project_images.index', ['project_id' => $request->project_id])->with('success', 'New Project Image Added');
    }

    public function edit($id)
    {
        $data = ProjectImage::where('id', $id)->first();
        return view('admin.project_images.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'project_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $slider = ProjectImage::findOrFail($id);

        if ($request->hasFile('project_image')) {
            // Delete the old image if it exists
            if ($slider->project_image) {
                $oldImagePath = public_path('uploads/project_image/' . $slider->project_image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Upload the new image
            $imageName = 'project_image' . rand() . '.' . $request->project_image->extension();
            $request->project_image->move(public_path('uploads/project_image/'), $imageName);
            $validatedData['project_image'] = $imageName;
        }

        $slider->update($validatedData);

        return redirect()->route('project_images.index', ['project_id' => $slider->project_id])->with('primary', 'Project Image Updated Successfully');
    }

    public function destroy($id)
    {
        $slider = ProjectImage::findOrFail($id);

        // Delete the old image if it exists
        if ($slider->project_image) {
            $oldFilePath = public_path('uploads/project_image/' . $slider->project_image);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }

        $slider->delete();

        return redirect()->back()->with('danger', 'Project Images Deleted Successfully');
    }
}
