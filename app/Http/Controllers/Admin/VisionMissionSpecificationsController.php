<?php

namespace App\Http\Controllers\Admin;

use App\Models\VisionMissionSpecification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VisionMissionSpecificationsController extends Controller
{
    public function index()
    {
        $data = VisionMissionSpecification::all();
        return view('admin.vision_mission_spec.index', compact("data"));
    }

    public function create()
    {
        return view('admin.vision_mission_spec.create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'short_description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,svg,webp',
        ]);

        if ($request->hasFile('image')) {
            $image = 'record' . rand() . '.' . $request->image->extension();
            $data['image'] = $image;
            $request->image->move(public_path('uploads/vision_mission_spec/'), $image);
        }

        VisionMissionSpecification::create($data);

        return redirect()->route('vision_mission_spec.index')->with('success', 'New Content Added');
    }

    public function edit($id)
    {
        $data = VisionMissionSpecification::where('id', $id)->first();
        return view('admin.vision_mission_spec.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'short_description' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png,svg,webp',
        ]);

        $record = VisionMissionSpecification::find($id);

        if ($request->hasFile('image')) {
            if ($record->image) {
                $oldThumbnailPath = public_path('uploads/vision_mission_spec/' . $record->image);
                if (file_exists($oldThumbnailPath)) {
                    unlink($oldThumbnailPath);
                }
            }

            $image = $request->file('image');
            $thumbnail_name = time() . 'das.' . $image->getClientOriginalExtension();
            $thumbnail_path = public_path('/uploads/vision_mission_spec/');
            $image->move($thumbnail_path, $thumbnail_name);
            $data['image'] = $thumbnail_name;
        }

        $record->update($data);

        return redirect()->route('vision_mission_spec.index')->with('primary', 'Updated Successfully');
    }

    public function destroy($id)
    {
        $record = VisionMissionSpecification::findOrFail($id);
        $record->delete();
        return redirect()->back()->with('danger', 'Content Deleted Successfully');
    }
}
