<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdblueSolutions;
use Illuminate\Http\Request;

class AdblueSolutionsController extends Controller
{
    public function index(Request $request)
    { 
        

        $data = AdblueSolutions::all();
        return view('admin.adblue_solutions.index', compact("data"));
    }

    public function create(Request $request)
    {
       
        return view('admin.adblue_solutions.create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,svg,webp',
            'priority' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $image = 'record' . rand() . '.' . $request->image->extension();
            $data['image'] = $image;
            $request->image->move(public_path('uploads/adblue_solutions/'), $image);
        }
        // dd($request->studyabroad_id);;

        AdblueSolutions::create($data);

        return redirect()->route('adblue_solutions.index')->with('success', 'New Content Added');
    }

    public function edit($id)
    {
       
        $data = AdblueSolutions::findOrFail($id);
        return view('admin.adblue_solutions.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png,svg,webp',
            'priority' => 'required',
        ]);

        $record = AdblueSolutions::findOrFail($id);


        if ($request->hasFile('image')) {
            if ($record->image) {
                $oldThumbnailPath = public_path('uploads/adblue_solutions/' . $record->image);
                if (file_exists($oldThumbnailPath)) {
                    unlink($oldThumbnailPath);
                }
            }

            $image = $request->file('image');
            $thumbnail_name = time() . 'das.' . $image->getClientOriginalExtension();
            $thumbnail_path = public_path('/uploads/adblue_solutions/');
            $image->move($thumbnail_path, $thumbnail_name);
            $data['image'] = $thumbnail_name;
        }

        $record->update($data);

        return redirect()->route('adblue_solutions.index')->with('primary', 'Updated Successfully');
    }

    public function destroy($id)
    {
        $record = AdblueSolutions::findOrFail($id);
        $record->delete();
        return redirect()->back()->with('danger', 'Content Deleted Successfully');
    }
}
