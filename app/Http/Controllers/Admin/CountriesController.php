<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CountriesController extends Controller

{
 
    public function index()
    {
        $data = Country::all();
        return view('admin.countries.index', compact('data'));
    }

  
    public function create()
    {
        return view('admin.countries.create');
    }



    
    public function store(Request $request)
    {
        $data = $request->validate([
            'country_name' => 'required',
            'country_image' => 'nullable|image',
        ]);
    
        if ($request->hasFile('country_image')) {
            $imageName = 'country_image_' . rand() . '.' . $request->country_image->extension();
            $data['country_image'] = $imageName;
            $request->country_image->move(public_path('uploads/country/'), $imageName);
        }
    
        Country::create($data);
    
        return redirect()->route('countries.index')->with('success', 'New Country Added');
    }
    

  
    public function show($id)
    {
        $data = Country::findOrFail($id);
        return view('countries.show', compact('data'));
    }

  
    public function edit($id)
    {
        $data = Country::findOrFail($id);
        return view('admin.countries.edit', compact('data'));
    }

  
   
    
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'country_name' => 'required',
            'country_image' => 'nullable|image',
        ]);
    
        $country = Country::findOrFail($id);
        
        if ($request->hasFile('country_image')) {
            if ($country->country_image) {
                $oldImagePath = public_path('uploads/country/' . $country->country_image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
            $imageName = 'image_' . rand() . '.' . $request->country_image->extension();
            $request->country_image->move(public_path('uploads/country/'), $imageName);
            $data['country_image'] = $imageName;
        }
    
        $country->update($data);
    
        return redirect()->route('countries.index')->with('primary', 'Country Updated Successfully');
    }
    


    public function destroy($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();

        return redirect()->route('countries.index')->with('danger', 'Country Deleted Successfully');
    }
}
