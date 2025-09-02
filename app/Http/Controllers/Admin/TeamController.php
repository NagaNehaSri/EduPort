<?php

namespace App\Http\Controllers\Admin;

use App\Models\Team;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeamController extends Controller
{
  public function index()
  {
    $data = Team::all();
    return view('admin.team.index', compact("data"));
  }
  //
  public function create()
  {
    return view('admin.team.create');
  }

  public function store(Request $request)
  {
    // dd($request);
    $data = $this->validate($request, [
      'name' => 'required',
      'designation' => 'required',
      'description' => 'nullable',
      'profile_image' => 'required|image',
    ]);

    if ($request->hasFile('profile_image')) {
      $profile_image = 'profile_image' . rand() . '.' . $request->profile_image->extension();
      $data['profile_image'] = $profile_image;
      $request->profile_image->move(public_path('uploads/team/'), $profile_image);
    }

    Team::create($data);

    return redirect()->route('team.index')->with('success', 'New Team Added');
  }

  public function edit($id)
  {
    $data = Team::where('id', $id)->first();
    return view('admin.team.edit', compact('data'));
  }

  public function update(Request $request, $id)
  {
    $data = $this->validate($request, [
      'name' => 'required',
      'designation' => 'required',
      'description' => 'nullable',
    ]);
    $profile_image = Team::find($id);

    if ($request->hasFile('profile_image')) {
      // Upload the new video file
      $profile_image = 'profile_image' . rand() . '.' . $request->profile_image->extension();
      $request->profile_image->move(public_path('uploads/team/'), $profile_image);

      $data['profile_image'] = $profile_image;
    }
    $profile_image->update($data);

    return redirect()->route('team.index')->with('primary', 'Team Updated Successfully');
  }
  function destroy($id)
  {
    $profile_image = Team::findOrFail($id);
    // Delete the old video file if it exists
    if ($profile_image->profile_image) {
      $oldFilePath = public_path('uploads/banners/' . $profile_image->profile_image);
      if (file_exists($oldFilePath)) {
        unlink($oldFilePath);
      }
    }
    $profile_image->delete();
    return redirect()->back()->with('danger', 'Team Deleted Successfully');
  }
}
