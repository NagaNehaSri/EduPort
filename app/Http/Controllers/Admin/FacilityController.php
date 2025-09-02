<?php

namespace App\Http\Controllers\Admin;

use App\Models\Facility;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
  public function index()
  {
    $data = Facility::all();
    return view('admin.facility.index', compact("data"));
  }
  //
  public function create()
  {
    return view('admin.facility.create');
  }

  public function store(Request $request)
  {
    // dd($request);
    $data = $this->validate($request, [
      'heading' => 'required|max:10',
      'description' => 'required|max:25',
      'image' => 'required|image',
    ]);

    if ($request->hasFile('image')) {
      $image = 'image' . rand() . '.' . $request->image->extension();
      $data['image'] = $image;
      $request->image->move(public_path('uploads/facility/'), $image);
    }

    Facility::create($data);

    return redirect()->route('facility.index')->with('success', 'New Facility Added');
  }

  public function edit($id)
  {
    $data = Facility::where('id', $id)->first();
    return view('admin.facility.edit', compact('data'));
  }

  public function update(Request $request, $id)
  {
    $data = $this->validate($request, [
      'heading' => 'required|max:10',
      'description' => 'required|max:25',
    ]);
    $image = Facility::find($id);

    if ($request->hasFile('image')) {
      // Upload the new video file
      $image = 'image' . rand() . '.' . $request->image->extension();
      $request->image->move(public_path('uploads/facility/'), $image);

      $data['image'] = $image;
    }
    $image->update($data);

    return redirect()->route('facility.index')->with('primary', 'Facility Updated Successfully');
  }
  function destroy($id)
  {
    $image = Facility::findOrFail($id);
    // Delete the old video file if it exists
    if ($image->image) {
      $oldFilePath = public_path('uploads/facility/' . $image->image);
      if (file_exists($oldFilePath)) {
        unlink($oldFilePath);
      }
    }
    $image->delete();
    return redirect()->back()->with('danger', 'Facility Deleted Successfully');
  }
}
