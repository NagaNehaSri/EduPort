<?php

namespace App\Http\Controllers\Admin;

use App\Models\StructuresProcessesFaq;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StructuresProcessesFaqController extends Controller
{
    public function index()
    {
        $data = StructuresProcessesFaq::all();
        return view('admin.structures_processes_faq.index', compact("data"));
    }

    public function create()
    {
        return view('admin.structures_processes_faq.create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'short_description' => 'required',
            // 'image' => 'required|mimes:jpg,jpeg,png,svg,webp',
        ]);

        // if ($request->hasFile('image')) {
        //     $image = 'record' . rand() . '.' . $request->image->extension();
        //     $data['image'] = $image;
        //     $request->image->move(public_path('uploads/vision_mission_spec/'), $image);
        // }

        StructuresProcessesFaq::create($data);

        return redirect()->route('structures_processes_faq.index')->with('success', 'New Content Added');
    }

    public function edit($id)
    {
        $data = StructuresProcessesFaq::where('id', $id)->first();
        return view('admin.structures_processes_faq.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'short_description' => 'required',
            // 'image' => 'nullable|mimes:jpg,jpeg,png,svg,webp',
        ]);

        $record = StructuresProcessesFaq::find($id);

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

        return redirect()->route('structures_processes_faq.index')->with('primary', 'Updated Successfully');
    }

    public function destroy($id)
    {
        $record = StructuresProcessesFaq::findOrFail($id);
        $record->delete();
        return redirect()->back()->with('danger', 'Content Deleted Successfully');
    }
}
