<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductFeature;

class ProductFeatureController extends Controller
{
    public function index()
    {
        $data = ProductFeature::all();
        return view('admin.product_feature.index', compact('data'));
    }

    public function create()
    {
        return view('admin.product_feature.create');
    }

    public function store(Request $request)
{
    $data = $request->validate([
        
        'feature_image' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
        'feature_description' => 'required|string',
        'heading'=> 'required|string',
        'short_description'=> 'required|string',
    ]);

    if ($request->hasFile('feature_image')) {
        $image = $request->file('feature_image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('/uploads/products/'), $imageName);
        $data['feature_image'] = $imageName;
    }

    ProductFeature::create($data);

    return redirect()->route('product_feature.index')->with('success', 'Product Feature created successfully.');
}


    public function show($id)
    {
        $data = ProductFeature::findOrFail($id);
        return view('admin.product_feature.show', compact('data'));
    }

    public function edit($id)
    {
        $data = ProductFeature::findOrFail($id);
        return view('admin.product_feature.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            
            'feature_image' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
            'feature_description' => 'required|string',
            'heading'=> 'required|string',
            'short_description'=> 'required|string',
        ]);

        $feature = ProductFeature::findOrFail($id);

        if ($request->hasFile('feature_image')) {
            if ($feature->feature_image && file_exists(public_path('/uploads/products/' . $feature->feature_image))) {
                unlink(public_path('/uploads/products/' . $feature->feature_image));
            }

            $image = $request->file('feature_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('/uploads/products/'), $imageName);
            $data['feature_image'] = $imageName;
        } else {
            $data['feature_image'] = $feature->feature_image; 
        }

        $feature->update($data);

        return redirect()->route('product_feature.index')->with('success', 'Product Feature updated successfully.');
    }


    public function destroy($id)
    {
        $feature = ProductFeature::findOrFail($id);

        if ($feature->feature_image && file_exists(public_path('/uploads/product_features/' . $feature->feature_image))) {
            unlink(public_path('/uploads/product_features/' . $feature->feature_image));
        }

        $feature->delete();

        return redirect()->route('product_feature.index')->with('success', 'Product Feature deleted successfully.');
    }
}
