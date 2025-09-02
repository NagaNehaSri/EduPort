<?php

namespace App\Http\Controllers\Admin;


use App\Models\Gallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
  public function index()
  {
      $data = Gallery::all();
      return view('admin.gallery.index', compact("data"));
  }

  public function create()
  {
      return view('admin.gallery.create');
  }

  public function store(Request $request)
  {
      $data = $this->validate($request, [
          'tag' => 'required|string|max:255',
          'heading' => 'required|string',
          'about_nexus' => 'required|string',
          'experienceiconimage' => 'required|string',
          'experience_text' => 'required|string',
          'about_nexus_description_1' => 'required|string',
          'about_nexus_description_2' => 'required|string',
          'aboutpage_description' => 'required|string',
          'aboutpage_image' => 'required|mimes:jpg,jpeg,png,gif',
          'about_nexus_image' => 'required|mimes:jpg,jpeg,png,gif',
      ]);

      if ($request->hasFile('aboutpage_image')) {
          $image = 'about_' . rand() . '.' . $request->aboutpage_image->extension();
          $data['aboutpage_image'] = $image;
          $request->aboutpage_image->move(public_path('uploads/'), $image);
      }

      Gallery::create($data);

      return redirect()->route('about.index')->with('success', 'New HomeAbout Added');
  }

  public function edit($id)
{
  $data = Gallery::findOrFail($id);
  return view('admin.gallery.edit', compact('data'));
}

public function update(Request $request, $id)
{

  $data = $this->validate($request, [
      'tag' => 'required|string|max:255',
      'heading' => 'required|string',
 
      'description' => 'required|string',
  
    
      'image' => 'nullable|mimes:jpg,jpeg,png,gif,webp,svg',

  ]);

  
  $about = Gallery::findOrFail($id);


  if ($request->hasFile('image')) {
  
      if ($about->image) {
          $oldFilePath = public_path('uploads/gallery/' . $about->image);
          if (file_exists($oldFilePath)) {
              unlink($oldFilePath);
          }
      }
    
      $image = 'image_' . time() . '.' . $request->image->extension();
      $data['image'] = $image;
      $request->image->move(public_path('uploads/gallery/'), $image);
  }
  

  // if ($request->hasFile('image_2')) {
  //     if ($about->image_2) {
  //         $oldFilePath = public_path('uploads/accreditations/' . $about->image_2);
  //         if (file_exists($oldFilePath)) {
  //             unlink($oldFilePath);
  //         }
  //     }
  //     $image_2 = 'image_2_' . time() . '.' . $request->image_2->extension();
  //     $data['image_2'] = $image_2;
  //     $request->image_2->move(public_path('uploads/accreditations/'), $image_2);
  // }


  $about->update($data);

  return redirect()->back()->with('success', 'Social Intiatives Content Updated Successfully');
}


  public function destroy($id)
  {
      $about = Gallery::findOrFail($id);

      
      if ($about->image) {
          $oldFilePath = public_path('uploads/Gallery/' . $about->image);
          if (file_exists($oldFilePath)) {
              unlink($oldFilePath);
          }
      }
      // if ($about->image_2) {
      //     $oldFilePath = public_path('uploads/accreditations/' . $about->image_2);
      //     if (file_exists($oldFilePath)) {
      //         unlink($oldFilePath);
      //     }
      // }
      // if ($about->mission_image) {
      //     $oldFilePath = public_path('uploads/about/' . $about->experienceiconimage);
      //     if (file_exists($oldFilePath)) {
      //         unlink($oldFilePath);
      //     }
      // }
      // if ($about->vision_icon_image) {
      //     $oldFilePath = public_path('uploads/about/' . $about->vision_icon_image);
      //     if (file_exists($oldFilePath)) {
      //         unlink($oldFilePath);
      //     }
      // }
      // if ($about->mission_icon_image) {
      //     $oldFilePath = public_path('uploads/about/' . $about->mission_icon_image);
      //     if (file_exists($oldFilePath)) {
      //         unlink($oldFilePath);
      //     }
      // }

      $about->delete();
      return redirect()->back()->with('danger', 'Deleted Successfully');
  }
}

