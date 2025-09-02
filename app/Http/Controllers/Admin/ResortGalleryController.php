<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\ResortGallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResortGalleryController extends Controller
{
  public function index()
  {
    $data = ResortGallery::all();
    return view('admin.resortgallery.index', compact("data"));
  }
  //
  public function create()
  {
    return view('admin.resortgallery.create');
  }

  public function store(Request $request)
  {
    $data = $this->validate($request, [
    
      'image' => 'required|mimes:jpg,jpeg,png|max:1536',
    ]);

    if ($request->hasFile('image')) {
      $image = 'image' . rand() . '.' . $request->image->extension();
      $data['image'] = $image;
      //dd($data['image']);
      $request->image->move(public_path('uploads/resortgallery/'), $image);
    } 

    ResortGallery::create($data);

    return redirect()->route('resortgallery.index')->with('success', 'New Image Added');
  }

  public function edit($id)
  {
    $data = ResortGallery::where('id', $id)->first();
    return view('admin.resortgallery.edit', compact('data'));
  }

  public function update(Request $request, $id)
  {
    $data = $this->validate($request, [
     
      'image' => 'nullable|mimes:jpg,jpeg,png|max:1536',
    ]);
    $record = ResortGallery::find($id);

    if ($request->hasFile('image')) {

      // Upload the new video file
      $image = 'image' . rand() . '.' . $request->image->extension();
      $request->image->move(public_path('uploads/resortgallery/'), $image);

      $data['image'] = $image;
    }
    $record->update($data);

    return redirect()->route('resortgallery.index')->with('primary', 'Image Updated Successfully');
  }
  function destroy($id)
  {
    $record = ResortGallery::findOrFail($id);
    // Delete the old video file if it exists
    if ($record->image) {
      $oldFilePath = public_path('uploads/resortgallery/' . $record->image);
      if (file_exists($oldFilePath)) {
        unlink($oldFilePath);
      }
    }
    $record->delete();
    return redirect()->back()->with('danger', 'Image Deleted Successfully');
  }
}
