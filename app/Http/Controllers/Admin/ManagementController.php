<?php

namespace App\Http\Controllers\Admin;

use App\Models\Management;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
  public function index()
  {
    $data = Management::all();
    return view('admin.management.index', compact("data"));
  }
  //
  public function create()
  {
    return view('admin.management.create');
  }

  public function store(Request $request)
  {
    // dd($request);
    $data = $this->validate($request, [
      'name' => 'required',
      'designation' => 'required',
      'review' => 'required',
      'profile_image' => 'required|image',
    ]);

    if ($request->hasFile('profile_image')) {
      $profile_image = 'profile_image' . rand() . '.' . $request->profile_image->extension();
      $data['profile_image'] = $profile_image;
      $request->profile_image->move(public_path('uploads/management/'), $profile_image);
    }

    Management::create($data);

    return redirect()->route('management.index')->with('success', 'New Management Added');
  }

  public function edit($id)
  {
    $data = Management::where('id', $id)->first();
    return view('admin.management.edit', compact('data'));
  }

  public function update(Request $request, $id)
  {
    $data = $this->validate($request, [
      'name' => 'required',
      'designation' => 'required',
      'review' => 'required',
    ]);
    $record = Management::find($id);

    if ($request->hasFile('profile_image')) {
      // Upload the new video file
      $profile_image = 'profile_image' . rand() . '.' . $request->profile_image->extension();
      $request->profile_image->move(public_path('uploads/management/'), $profile_image);

      $data['profile_image'] = $profile_image;
    }
    $record->update($data);

    return redirect()->route('management.index')->with('primary', 'Management Updated Successfully');
  }
  function destroy($id)
  {
    $record = Management::findOrFail($id);
    // Delete the old video file if it exists
    if ($record->profile_image) {
      $oldFilePath = public_path('uploads/management/' . $record->profile_image);
      if (file_exists($oldFilePath)) {
        unlink($oldFilePath);
      }
    }
    $record->delete();
    return redirect()->back()->with('danger', 'Management Deleted Successfully');
  }
}
