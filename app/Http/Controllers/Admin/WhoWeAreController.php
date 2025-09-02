<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WhoWeAre;

class WhoWeAreController extends Controller
{
   
    public function index()
    {
        $data = WhoWeAre::all();
        return view('admin.who_we_are.index', compact('data'));
    }

    
    public function create()
    {
        return view('admin.who_we_are.create');
    }

   
    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png',
            'title' => 'required|string|max:255',
         
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_who_we_are.' . $image->getClientOriginalExtension();
            $imagePath = public_path('/uploads/who_we_are/');
            $image->move($imagePath, $imageName);
            $data['image'] = $imageName;
        }

        WhoWeAre::create($data);
        return redirect()->route('who_we_are.index')->with('success', 'Created Successfully');
    }

     public function edit($id)
    {
        $data = WhoWeAre::findOrFail($id);
        return view('admin.who_we_are.edit', compact('data'));
    }

  
    public function update(Request $request, $id)
    {
        $whoWeAre = WhoWeAre::findOrFail($id);

        $data = $request->validate([
            'image' => 'sometimes|mimes:jpg,jpeg,png',
            'title' => 'required|string|max:255',
            
        ]);

        if ($request->hasFile('image')) {
            $oldImagePath = public_path('uploads/who_we_are/' . $whoWeAre->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            $image = $request->file('image');
            $imageName = time() . '_who_we_are.' . $image->getClientOriginalExtension();
            $imagePath = public_path('/uploads/who_we_are/');
            $image->move($imagePath, $imageName);
            $data['image'] = $imageName;
        }

        $whoWeAre->update($data);
        return redirect()->route('who_we_are.index')->with('success', 'Updated Successfully');
    }


    public function destroy($id)
    {
        $whoWeAre = WhoWeAre::findOrFail($id);
        $imagePath = public_path('uploads/who_we_are/' . $whoWeAre->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $whoWeAre->delete();
        return redirect()->back()->with('danger', 'Deleted Successfully');
       
    }
}
