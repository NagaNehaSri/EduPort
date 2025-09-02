<?php

namespace App\Http\Controllers\Admin;

use App\Models\ServiceFeature;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceFeatureController extends Controller
{
  public function index(Request $request)
  {
    $service_id = $request->service_id;
    $data = ServiceFeature::where('service_id', $service_id)->get();
    return view('admin.service_feature.index', compact('data', 'service_id'));
  }
  public function create(Request $request)
  {
    $service_id = $request->service_id;
    return view('admin.service_feature.create', compact("service_id"));
  }

  public function store(Request $request)
  {
    // dd($request);
    $data = $this->validate($request, [
      'service_id' => 'required',
      'title' => 'required',
      'priority' => 'required',
    
      'image' => 'required',
      // 'description' => 'nullable',
      // 'status' => 'nullable',
    ]);

    if ($request->hasFile('image')) {
      $image = 'image' . rand() . '.' . $request->image->extension();
      $data['image'] = $image;
      $request->image->move(public_path('uploads/service_feature/'), $image);
    }
    ServiceFeature::create($data);
    return redirect()->route('service_feature.index', ['service_id' => $request->service_id])->with('success', 'New Service Feature Added');
  }

  public function edit($id)
  {
    $data = ServiceFeature::where('id', $id)->first();
    return view('admin.service_feature.edit', compact('data'));
  }

  public function update(Request $request, $id)
  {
    $data = $this->validate($request, [
      'service_id' => 'required',
      'title' => 'required',
      'priority' => 'required',
    
      'image' => 'nullable',
      // 'description' => 'nullable',
      // 'status' => 'nullable',
    ]);
    
    $image = ServiceFeature::find($id);

    if ($request->hasFile('image')) {
      // Upload the new video file
      $image = 'image' . rand() . '.' . $request->image->extension();
      $request->image->move(public_path('uploads/service_feature/'), $image);

      $data['image'] = $image;
    }
    $image->update($data);

    return redirect()->route('service_feature.index',['service_id' => $image->service_id])->with('primary', 'Service Feature Updated Successfully');
  }
  function destroy($id)
  {
    $image = ServiceFeature::findOrFail($id);
    // Delete the old video file if it exists
    if ($image->image) {
      $oldFilePath = public_path('uploads/service_feature/' . $image->image);
      if (file_exists($oldFilePath)) {
        unlink($oldFilePath);
      }
    }
    $image->delete();
    return redirect()->back()->with('danger', 'Service Feature Deleted Successfully');
  }
}
