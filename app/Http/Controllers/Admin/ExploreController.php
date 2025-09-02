<?php

namespace App\Http\Controllers\Admin;

use App\Models\Explore;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
  public function index()
  {
    $data = Explore::all();
    return view('admin.explore.index', compact("data"));
  }
  //
  public function create()
  {
    return view('admin.explore.create');
  }

  public function store(Request $request)
  {
    $data = $this->validate($request, [
      'name' => 'required',
      'image' => 'required|mimes:jpg,jpeg,png',
      'redirect_link' => 'nullable',
    ]);

    if ($request->hasFile('image')) {
      $image = 'image' . rand() . '.' . $request->image->extension();
      $data['image'] = $image;
      //dd($data['image']);
      $request->image->move(public_path('uploads/explore/'), $image);
    }

    Explore::create($data);

    return redirect()->route('explore.index')->with('success', 'New Explore Added');
  }

  public function edit($id)
  {
    $data = Explore::where('id', $id)->first();
    return view('admin.explore.edit', compact('data'));
  }

  public function update(Request $request, $id)
  {
    $data = $this->validate($request, [
      'name' => 'required',
      'redirect_link' => 'required',
    ]);

    $record = Explore::find($id); // Change variable name

    if ($request->hasFile('image')) {
      // Upload the new image file
      $image = 'image' . rand() . '.' . $request->image->extension();
      $request->image->move(public_path('uploads/explore/'), $image);

      $data['image'] = $image;
    }

    $record->update($data); // Use correct variable

    return redirect()->route('explore.index')->with('primary', 'Explore Updated Successfully');
  }

  function destroy($id)
  {
    $record = Explore::findOrFail($id);
    // Delete the old video file if it exists
    if ($record->image) {
      $oldFilePath = public_path('uploads/banners/' . $record->image);
      if (file_exists($oldFilePath)) {
        unlink($oldFilePath);
      }
    }
    $record->delete();
    return redirect()->back()->with('danger', 'Explore Deleted Successfully');
  }
}
