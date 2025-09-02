<?php

namespace App\Http\Controllers\Admin;

use App\Models\ResortSection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResortSectionController extends Controller
{
  public function index()
  {
    $data = ResortSection::all();
    return view('admin.resort_section.index', compact("data"));
  }
  //
  public function create()
  {
    return view('admin.resort_section.create');
  }

  public function store(Request $request)
  {
    // dd($request);
    $data = $this->validate($request, [
      'heading' => 'required|max:255',
      'description' => 'nullable',
      'image' => 'required|image',
    ]);

    if ($request->hasFile('image')) {
      $image = 'image' . rand() . '.' . $request->image->extension();
      $data['image'] = $image;
      $request->image->move(public_path('uploads/resort_section/'), $image);
    }

    ResortSection::create($data);

    return redirect()->route('resort_section.index')->with('success', 'New ResortSection Added');
  }

  public function edit($id)
  {
    $data = ResortSection::where('id', $id)->first();
    return view('admin.resort_section.edit', compact('data'));
  }

  public function update(Request $request, $id)
  {
    $data = $this->validate($request, [
      'heading' => 'required|max:255',
      'description' => 'nullable',
    ]);
    $image = ResortSection::find($id);

    if ($request->hasFile('image')) {
      // Upload the new video file
      $image = 'image' . rand() . '.' . $request->image->extension();
      $request->image->move(public_path('uploads/resort_section/'), $image);

      $data['image'] = $image;
    }
    $image->update($data);

    return redirect()->route('resort_section.index')->with('primary', 'ResortSection Updated Successfully');
  }
  function destroy($id)
  {
    $image = ResortSection::findOrFail($id);
    // Delete the old video file if it exists
    if ($image->image) {
      $oldFilePath = public_path('uploads/resort_section/' . $image->image);
      if (file_exists($oldFilePath)) {
        unlink($oldFilePath);
      }
    }
    $image->delete();
    return redirect()->back()->with('danger', 'ResortSection Deleted Successfully');
  }
}
