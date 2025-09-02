<?php

namespace App\Http\Controllers\Admin;

use App\Models\Promotion;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
  public function index()
  {
    $data = Promotion::all();
    return view('admin.promotion.index', compact("data"));
  }
  //
  public function create()
  {
    return view('admin.promotion.create');
  }

  public function store(Request $request)
  {
    // dd($request);
    $data = $this->validate($request, [
      'title' => 'required',
      'youtube_link' => 'required',
      'image' => 'required|image',
    ]);

    if ($request->hasFile('image')) {
      $image = 'image' . rand() . '.' . $request->image->extension();
      $data['image'] = $image;
      $request->image->move(public_path('uploads/promotion/'), $image);
    }

    Promotion::create($data);

    return redirect()->route('promotion.index')->with('success', 'New Promotion Added');
  }

  public function edit($id)
  {
    $data = Promotion::where('id', $id)->first();
    return view('admin.promotion.edit', compact('data'));
  }

  public function update(Request $request, $id)
  {
    $data = $this->validate($request, [
      'title' => 'required',
      'youtube_link' => 'required',
    ]);
    $promotion = Promotion::find($id);

    if ($request->hasFile('image')) {

      try {
        $oldFilePath = public_path('uploads/promotion/' . $promotion->image);
        if (file_exists($oldFilePath)) {
          unlink($oldFilePath);
        }
        $image = 'image' . rand() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/promotion/'), $image);
      } catch (Exception $e) {
        $image = 'image' . rand() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/promotion/'), $image);
      }

      $data['image'] = $image;
    }
    $promotion->update($data);

    return redirect()->back()->with('primary', 'Promotion Updated Successfully');
  }
  function destroy($id)
  {
    $image = Promotion::findOrFail($id);
    // Delete the old video file if it exists
    if ($image->image) {
      $oldFilePath = public_path('uploads/banners/' . $image->image);
      if (file_exists($oldFilePath)) {
        unlink($oldFilePath);
      }
    }
    $image->delete();
    return redirect()->back()->with('danger', 'Promotion Deleted Successfully');
  }
}
