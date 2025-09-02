<?php

namespace App\Http\Controllers\Admin;

use App\Models\Partnership;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PartnershipController extends Controller
{
  public function index()
  {
    $data = Partnership::all();
    return view('admin.partnership.index', compact("data"));
  }
  //
  public function create()
  {
    return view('admin.partnership.create');
  }

  public function store(Request $request)
  {
    // dd($request);
    $data = $this->validate($request, [
      'name' => 'required',
      'logo' => 'required|image',
    ]);

    if ($request->hasFile('logo')) {
      $logo = 'logo' . rand() . '.' . $request->logo->extension();
      $data['logo'] = $logo;
      $request->logo->move(public_path('uploads/partnership/'), $logo);
    }

    Partnership::create($data);

    return redirect()->route('partnership.index')->with('success', 'New Partner Added');
  }

  public function edit($id)
  {
    $data = Partnership::where('id', $id)->first();
    return view('admin.partnership.edit', compact('data'));
  }

  public function update(Request $request, $id)
  {
    $data = $this->validate($request, [
      'name' => 'required',
    ]);
    $logo = Partnership::find($id);

    if ($request->hasFile('logo')) {
      // Upload the new video file
      $logo = 'logo' . rand() . '.' . $request->logo->extension();
      $request->logo->move(public_path('uploads/partnership/'), $logo);

      $data['logo'] = $logo;
    }
    $logo->update($data);

    return redirect()->route('partnership.index')->with('primary', 'Partner Updated Successfully');
  }
  function destroy($id)
  {
    $logo = Partnership::findOrFail($id);
    // Delete the old video file if it exists
    if ($logo->logo) {
      $oldFilePath = public_path('uploads/banners/' . $logo->logo);
      if (file_exists($oldFilePath)) {
        unlink($oldFilePath);
      }
    }
    $logo->delete();
    return redirect()->back()->with('danger', 'Partner Deleted Successfully');
  }
}
