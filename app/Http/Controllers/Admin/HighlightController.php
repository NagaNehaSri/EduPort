<?php

namespace App\Http\Controllers\Admin;

use App\Models\Highlight;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HighlightController extends Controller
{
  public function index()
  {
    $data = Highlight::all();
    return view('admin.highlight.index', compact("data"));
  }
  //
  public function create()
  {
    return view('admin.highlight.create');
  }
  public function store(Request $request)
{
    $data = $request->validate([
        'heading' => 'nullable|string',
        'priority' => 'nullable|integer',
        // 'image' => 'nullable|image',
    ]);

    // Set default values if missing
    $data['heading'] = $data['heading'] ?? '';
    $data['priority'] = $data['priority'] ?? 0;

    // If you plan to handle image later, you can uncomment this block
    /*
    if ($request->hasFile('image')) {
        $image = 'image_' . rand() . '.' . $request->image->extension();
        $data['image'] = $image;
        $request->image->move(public_path('uploads/highlight/'), $image);
    }
    */

    Highlight::create($data);

    return redirect()->route('highlight.index')->with('success', 'New Highlight Added');
}


//   public function store(Request $request)
//   {
//     // dd($request);
//     $data = $this->validate($request, [
//       'heading' => 'required',
//       'priority'=> 'required',
//       // 'description' => 'required|max:100',
//       // 'image' => 'required|image',
//     ]);

//     // if ($request->hasFile('image')) {
//     //   $image = 'image' . rand() . '.' . $request->image->extension();
//     //   $data['image'] = $image;
//     //   $request->image->move(public_path('uploads/highlight/'), $image);
//     // }

//     Highlight::create($data);

//     return redirect()->route('highlight.index')->with('success', 'New Highlight Added');
//   }

  public function edit($id)
  {
    $data = Highlight::where('id', $id)->first();
    return view('admin.highlight.edit', compact('data'));
  }
  public function update(Request $request, $id)
{
    $data = $request->validate([
        'heading' => 'nullable|string',
        'priority' => 'nullable|string',
        // 'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
    ]);

    // Set default values for null fields
    $defaults = [
        'heading' => '',
        'priority' => '',
    ];

    foreach ($defaults as $key => $value) {
        $data[$key] = $data[$key] ?? $value;
    }

    $highlight = Highlight::findOrFail($id);

    // Optional: Handle image upload if needed
    /*
    if ($request->hasFile('image')) {
        $imageName = 'image_' . uniqid() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/highlight/'), $imageName);
        $data['image'] = $imageName;
    }
    */

    $highlight->update($data);

    return redirect()->route('highlight.index')->with('primary', 'Highlight Updated Successfully');
}


//   public function update(Request $request, $id)
//   {
//     $data = $this->validate($request, [
//       'heading' => 'required',
//       'priority'=> 'required',
//     ]);
//     $image = Highlight::find($id);

//     // if ($request->hasFile('image')) {
//     //   // Upload the new video file
//     //   $image = 'image' . rand() . '.' . $request->image->extension();
//     //   $request->image->move(public_path('uploads/highlight/'), $image);

//     //   $data['image'] = $image;
//     // }
//     $image->update($data);

//     return redirect()->route('highlight.index')->with('primary', 'Highlight Updated Successfully');
//   }
  function destroy($id)
  {
    $image = Highlight::findOrFail($id);
    // Delete the old video file if it exists
    if ($image->image) {
      $oldFilePath = public_path('uploads/highlight/' . $image->image);
      if (file_exists($oldFilePath)) {
        unlink($oldFilePath);
      }
    }
    $image->delete();
    return redirect()->back()->with('danger', 'Highlight Deleted Successfully');
  }
}
