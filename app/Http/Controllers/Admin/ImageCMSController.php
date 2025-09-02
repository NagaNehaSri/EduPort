<?php

namespace App\Http\Controllers\Admin;

use App\Models\ImageCMS;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageCMSController extends Controller
{
  public function index()
  {
    $data = ImageCMS::all();
    return view('admin.image_cms.index', compact("data"));
  }
  //
  public function create()
  {
    return view('admin.image_cms.create');
  }

  public function store(Request $request)
  {
    $data = $this->validate($request, [
      'section_name' => 'required',
      'image' => 'required|mimes:jpg,jpeg,png',
    ]);

    if ($request->hasFile('image')) {
      $image = 'image' . rand() . '.' . $request->image->extension();
      $data['image'] = $image;
      //dd($data['image']);
      $request->image->move(public_path('uploads/cms/'), $image);
    } 

    ImageCMS::create($data);

    return redirect()->route('image_cms.index')->with('success', 'New Image Added');
  }

  public function edit($id)
  {
    $data = ImageCMS::where('id', $id)->first();
    return view('admin.image_cms.edit', compact('data'));
  }

  public function update(Request $request, $id)
{
    $data = $this->validate($request, [
        'section_name' => 'nullable',
    ]);

    $imageCMS = ImageCMS::find($id); // Change variable name

    if ($request->hasFile('image')) {
        // Upload the new image file
        $image = 'image' . rand() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/cms/'), $image);

        $data['image'] = $image;
    }

    $imageCMS->update($data); // Use correct variable

    return redirect()->route('image_cms.index')->with('primary', 'Image Updated Successfully');
}

  function destroy($id)
  {
    $image = ImageCMS::findOrFail($id);
    // Delete the old video file if it exists
    if ($image->image) {
      $oldFilePath = public_path('uploads/banners/' . $image->image);
      if (file_exists($oldFilePath)) {
        unlink($oldFilePath);
      }
    }
    $image->delete();
    return redirect()->back()->with('danger', 'Image Deleted Successfully');
  }
}
