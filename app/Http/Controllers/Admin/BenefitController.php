<?php

namespace App\Http\Controllers\Admin;

use App\Models\Benefit;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BenefitController extends Controller
{
    public function index()
    {
        $data = Benefit::all();
        return view('admin.benefit.index', compact("data"));
    }
    //
    public function create()
    {
        return view('admin.benefit.create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'heading' => 'required',
            'description' => 'required|max:150',
            'long_description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,svg',
            'view_image' => 'required|mimes:jpg,jpeg,png,svg',
        ]);

        if ($request->hasFile('image')) {
            $image = 'benefit' . rand() . '.' . $request->image->extension();
            $data['image'] = $image;
            //dd($data['image']);
            $request->image->move(public_path('uploads/benefits/'), $image);
        }
        if ($request->hasFile('view_image')) {
            $view_image = 'benefitsada' . rand() . '.' . $request->view_image->extension();
            $data['view_image'] = $view_image;
            //dd($data['view_image']);
            $request->view_image->move(public_path('uploads/benefits/'), $view_image);
        }
        $data['slug'] = Str::slug($request->heading, '-');
        Benefit::create($data);

        return redirect()->route('benefit.index')->with('success', 'New Benefit Added');
    }

    public function edit($id)
    {
        $data = Benefit::where('id', $id)->first();
        return view('admin.benefit.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'heading' => 'required',
            'description' => 'required|max:150',
            'long_description' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png,svg',
            'view_image' => 'nullable|mimes:jpg,jpeg,png,svg',
        ]);

        $benefit = Benefit::find($id);

            // Handle the header image upload
    if ($request->hasFile('image')) {
        // Delete the old header image if it exists
        if ($benefit->image) {
          $oldHeaderPath = public_path('uploads/benefits/' . $benefit->image);
          if (file_exists($oldHeaderPath)) {
            unlink($oldHeaderPath);
          }
        }
  
        // Upload the new header image
        $image = $request->file('image');
        $header_name = time() . 'vsde.' . $image->getClientOriginalExtension();
        $header_path = public_path('/uploads/benefits/');
        $image->move($header_path, $header_name);
        $data['image'] = $header_name;
      }
  

        // Handle the header image upload
    if ($request->hasFile('view_image')) {
        // Delete the old header image if it exists
        if ($benefit->view_image) {
          $oldHeaderPath = public_path('uploads/benefits/' . $benefit->view_image);
          if (file_exists($oldHeaderPath)) {
            unlink($oldHeaderPath);
          }
        }
  
        // Upload the new header image
        $view_image = $request->file('view_image');
        $header_name = time() . 've.' . $view_image->getClientOriginalExtension();
        $header_path = public_path('/uploads/benefits/');
        $view_image->move($header_path, $header_name);
        $data['view_image'] = $header_name;
      }
      $data['slug'] = Str::slug($request->heading, '-');
       
        $benefit->update($data);
        return redirect()->route('benefit.index')->with('primary', 'Benefit Updated Successfully');
    }
    function destroy($id)
    {
        $benefit = Benefit::findOrFail($id);
        // Delete the old video file if it exists
        if ($benefit->image) {
            $oldFilePath = public_path('uploads/benefits/' . $benefit->image);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
        $benefit->delete();
        return redirect()->back()->with('danger', 'Benefit Deleted Successfully');
    }
}
