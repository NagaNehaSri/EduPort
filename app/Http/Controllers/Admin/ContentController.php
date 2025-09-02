<?php

namespace App\Http\Controllers\Admin;

use App\Models\Content;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContentController extends Controller
{
  public function index()
  {
    $data = Content::all();
    return view('admin.content.index', compact("data"));
  }
  //
  public function create()
  
  {
    return view('admin.content.create');
  }

  public function store(Request $request)
  {
    $data = $this->validate($request, [
      'tag' => 'required',
      'heading' => 'nullable',
      'image'=> 'nullable|mimes:png,jpg',
    ]);

    $data['description'] = $request->description;

    if ($request->hasFile('image')) {
      $image = 'imageadsdr_s' . rand() . '.' . $request->image->extension();
      $data['image'] = $image;
      $request->image->move(public_path('uploads/cms/'), $image);
    }

    Content::create($data);

    return redirect()->route('content.index')->with('success', 'New Content Added');
  }

  public function edit($id)
  {
    $data = Content::where('id', $id)->first();
    return view('admin.content.edit', compact('data'));
  }

  public function update(Request $request, $id)
  {
    $data = $this->validate($request, [
      'heading' => 'nullable',
      'image' => 'nullable|mimes:png,jpg',
    ]);
    $data['description'] = $request->description;
    $record = Content::find($id);
    if ($request->hasFile('image')) {
      // Delete the old thumbnail image if it exists
      if ($record->image) {
        $oldThumbnailPath = public_path('uploads/cms/' . $record->image);
        if (file_exists($oldThumbnailPath)) {
          unlink($oldThumbnailPath);
        }
      }

      // Upload the new thumbnail image
      $image = $request->file('image');
      $thumbnail_name = time() . 'asadasd.' . $image->getClientOriginalExtension();
      $thumbnail_path = public_path('/uploads/cms/');
      $image->move($thumbnail_path, $thumbnail_name);
      $data['image'] = $thumbnail_name;
    }
    $record->update($data);

    return redirect()->route('content.index')->with('primary', 'Content Updated Successfully');
  }
  function destroy($id)
  {
    $content = Content::findOrFail($id);
    $content->delete();
    return redirect()->back()->with('danger', 'Content Deleted Successfully');
  }
}
