<?php

namespace App\Http\Controllers\Admin;

use App\Models\HomeAbout;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeAboutController extends Controller
{
  public function index()
{
    $data = HomeAbout::all();
    return view('admin.home_about.index', compact("data"));
}

public function create()
{
    return view('admin.home_about.create');
}

public function store(Request $request)
{
    $data = $request->validate([
        'description'     => 'required|string',
        'heading'         => 'required|string',
        'count_heading'   => 'required|string',
        'count'           => 'required|string',
        'image1'          => 'nullable|mimes:jpg,jpeg,png',
    ]);

    if ($request->hasFile('image1')) {
        $image1 = 'home_about_image1_' . rand() . '.' . $request->image1->extension();
        $request->image1->move(public_path('uploads/home_about/'), $image1);
        $data['image1'] = $image1;
    }

    HomeAbout::create($data);

    return redirect()->route('home_about.index')->with('success', 'New HomeAbout Added');
}

public function edit($id)
{
    $data = HomeAbout::findOrFail($id);
    return view('admin.home_about.edit', compact('data'));
}

public function update(Request $request, $id)
{
    $data = $request->validate([
        'description' => 'nullable|string',
        'heading'     => 'nullable|string',
        'image1'      => 'nullable|mimes:jpg,jpeg,png',
    ]);

    $home_about = HomeAbout::findOrFail($id);

    if ($request->hasFile('image1')) {
        // Delete old image if exists
        if (!empty($home_about->image1)) {
            $oldImage1Path = public_path('uploads/home_about/' . $home_about->image1);
            if (file_exists($oldImage1Path)) {
                unlink($oldImage1Path);
            }
        }

        // Upload new image
        $image1Name = time() . '_home_about1.' . $request->image1->getClientOriginalExtension();
        $request->image1->move(public_path('uploads/home_about/'), $image1Name);
        $data['image1'] = $image1Name;
    }

    $home_about->update($data);

    return redirect()->route('home_about.index')->with('primary', 'HomeAbout Updated Successfully');
}

public function destroy($id)
{
    $home_about = HomeAbout::findOrFail($id);

    if (!empty($home_about->image1)) {
        $oldFilePath = public_path('uploads/home_about/' . $home_about->image1);
        if (file_exists($oldFilePath)) {
            unlink($oldFilePath);
        }
    }

    $home_about->delete();
    return redirect()->back()->with('danger', 'Deleted Successfully');
}

}
