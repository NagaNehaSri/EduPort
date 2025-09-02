<?php

namespace App\Http\Controllers\Admin;

use App\Models\Location;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocationController extends Controller
{
  public function index()
  {
    $data = Location::all();
    return view('admin.location.index', compact("data"));
  }
  //
  public function create()
  {
    return view('admin.location.create');
  }

  public function store(Request $request)
  {
    $data = $this->validate($request, [
      'tag' => 'required|string|max:255',
      'heading' => 'required|string|max:255',
      'description' => 'required|string',
      
     
      'image' => 'required|mimes:jpg,jpeg,png',
      
    ]);

    if ($request->hasFile('image')) {
      $image = 'location' . rand() . '.' . $request->image->extension();
      $data['image'] = $image;
      //dd($data['image']);
      $request->image->move(public_path('uploads/'), $image);
    }
  

    Location::create($data);

    return redirect()->route('location.index')->with('success', 'New Location Added');
  }

  public function edit($id)
  {
    $data = Location::where('id', $id)->first();
    return view('admin.location.edit', compact('data'));
  }

  public function update(Request $request, $id)
  {
      $data = $this->validate($request, [
          'tag' => 'required|string|max:255',
          'heading' => 'required|string|max:255',
          'description' => 'required|string',
       
         
          'image' => 'nullable|mimes:jpg,jpeg,png',

      ]);
  
      $location = Location::find($id);
  
      // Handle the thumbnail image upload
      if ($request->hasFile('image')) {
          // Delete the old thumbnail image if it exists
          if ($location->image) {
              $oldThumbnailPath = public_path('uploads/' . $location->image);
              if (file_exists($oldThumbnailPath)) {
                  unlink($oldThumbnailPath);
              }
          }
  
          // Upload the new thumbnail image
          $image = $request->file('image');
          $thumbnail_name = time() . 'location.' . $image->getClientOriginalExtension();
          $thumbnail_path = public_path('/uploads/');
          $image->move($thumbnail_path, $thumbnail_name);
          $data['image'] = $thumbnail_name;
      }
  
  
      $location->update($data);
  
      return redirect()->back()->with('primary', 'Updated Successfully');
  }
  
  function destroy($id)
  {
    $location = Location::findOrFail($id);
    // Delete the old video file if it exists
    if ($location->image) {
      $oldFilePath = public_path('uploads/' . $location->image);
      if (file_exists($oldFilePath)) {
        unlink($oldFilePath);
      }
    }
   
    $location->delete();
    return redirect()->back()->with('danger', 'Deleted Successfully');
  }
}
