<?php

namespace App\Http\Controllers\Admin;

use App\Models\SuccessStorySpec;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuccesStoriesSpecController extends Controller
{
    public function index()
    {
        $data = SuccessStorySpec::all();
        return view('admin.succes_stories_spec.index', compact("data"));
    }

    public function create()
    {
        return view('admin.succes_stories_spec.create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'desgination'=>'required',
            'short_description' => 'required',
            // 'image' => 'required|mimes:jpg,jpeg,png,svg,webp',
        ]);

        // if ($request->hasFile('image')) {
        //     $image = 'record' . rand() . '.' . $request->image->extension();
        //     $data['image'] = $image;
        //     $request->image->move(public_path('uploads/vision_mission_spec/'), $image);
        // }

        SuccessStorySpec::create($data);

        return redirect()->route('succes_stories_spec.index')->with('success', 'New Content Added');
    }

    public function edit($id)
    {
        $data = SuccessStorySpec::where('id', $id)->first();
        return view('admin.succes_stories_spec.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'desgination'=>'required',

            'short_description' => 'required',
            // 'image' => 'nullable|mimes:jpg,jpeg,png,svg,webp',
        ]);

        $record = SuccessStoryspec::find($id);

        // if ($request->hasFile('image')) {
        //     if ($record->image) {
        //         $oldThumbnailPath = public_path('uploads/vision_mission_spec/' . $record->image);
        //         if (file_exists($oldThumbnailPath)) {
        //             unlink($oldThumbnailPath);
        //         }
        //     }

        //     $image = $request->file('image');
        //     $thumbnail_name = time() . 'das.' . $image->getClientOriginalExtension();
        //     $thumbnail_path = public_path('/uploads/vision_mission_spec/');
        //     $image->move($thumbnail_path, $thumbnail_name);
        //     $data['image'] = $thumbnail_name;
        // }

        $record->update($data);

        return redirect()->route('succes_stories_spec.index')->with('primary', 'Updated Successfully');
    }

    public function destroy($id)
    {
        $record = SuccessStorySpec::findOrFail($id);
        $record->delete();
        return redirect()->back()->with('danger', 'Content Deleted Successfully');
    }
}


