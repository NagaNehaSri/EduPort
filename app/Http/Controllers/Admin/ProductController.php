<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    //
    public function index()
    {
        $data = Product::orderby('created_at', 'DESC')->get();
        return view('admin.product.index', compact('data'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
      
            'product_name' => 'required|unique:products',
            'priority' => 'required',

            'short_description' => 'required',
            // 'product_short_description'=> 'required',
            'description' => 'required',
            // 'description2' => 'required',
            'thumbnail_image' => 'required',
            'view_image' => 'required',
           
        ]);

       
        if ($request->hasFile('thumbnail_image')) {
            $thumbnail_image = $request->file('thumbnail_image');
            $thumbnail_name = time() . 'th.' . $thumbnail_image->getClientOriginalExtension();
            $thumbnail_path = public_path('/uploads/products/');
            $thumbnail_image->move($thumbnail_path, $thumbnail_name);
            $data['thumbnail_image'] = $thumbnail_name;
        }

      
        if ($request->hasFile('view_image')) {
            $view_image = $request->file('view_image');
            $header_name = time() . 've.' . $view_image->getClientOriginalExtension();
            $header_path = public_path('/uploads/products/');
            $view_image->move($header_path, $header_name);
            $data['view_image'] = $header_name;
        }

        // Generate the slug from the title
        $data['slug'] = Str::slug($request->product_name, '-');

        Product::create($data);

        return redirect()->route('product.index')->with('success', 'New Product Added');
    }


    public function edit($id)
    {
        $data = Product::where('id', $id)->first();
        $categories = Category::all();
        return view('admin.product.edit', compact('data', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'product_name' => 'required|unique:products',
            'priority' => 'required',

            'short_description' => 'required',
            // 'product_short_description'=> 'required',
            'description' => 'required',
            // 'description2' => 'required',
            'thumbnail_image' => 'nullable',
            'view_image' => 'nullable',
            
        ]);

        $product = Product::find($id);

        // Handle the thumbnail image upload
        if ($request->hasFile('thumbnail_image')) {
            // Delete the old thumbnail image if it exists
            if ($product->thumbnail_image) {
                $oldThumbnailPath = public_path('uploads/products/' . $product->thumbnail_image);
                if (file_exists($oldThumbnailPath)) {
                    unlink($oldThumbnailPath);
                }
            }

            // Upload the new thumbnail image
            $thumbnail_image = $request->file('thumbnail_image');
            $thumbnail_name = time() . 'th.' . $thumbnail_image->getClientOriginalExtension();
            $thumbnail_path = public_path('/uploads/products/');
            $thumbnail_image->move($thumbnail_path, $thumbnail_name);
            $data['thumbnail_image'] = $thumbnail_name;
        }

        // Handle the header image upload
        if ($request->hasFile('view_image')) {
            // Delete the old header image if it exists
            if ($product->view_image) {
                $oldHeaderPath = public_path('uploads/products/' . $product->view_image);
                if (file_exists($oldHeaderPath)) {
                    unlink($oldHeaderPath);
                }
            }

            // Upload the new header image
            $view_image = $request->file('view_image');
            $header_name = time() . 've.' . $view_image->getClientOriginalExtension();
            $header_path = public_path('/uploads/products/');
            $view_image->move($header_path, $header_name);
            $data['view_image'] = $header_name;
        }

        // Generate the slug from the title
        $data['slug'] = Str::slug($request->product_name, '-');

        $product->update($data);

        return redirect()->route('product.index')->with('success', 'Product Data Updated :)');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Delete the thumbnail image if it exists
        if ($product->thumbnail_image) {
            $oldThumbnailPath = public_path('uploads/products/' . $product->thumbnail_image);
            if (file_exists($oldThumbnailPath)) {
                unlink($oldThumbnailPath);
            }
        }

        // Delete the header image if it exists
        if ($product->view_image) {
            $oldHeaderPath = public_path('uploads/products/' . $product->view_image);
            if (file_exists($oldHeaderPath)) {
                unlink($oldHeaderPath);
            }
        }

        $product->delete();

        return redirect()->route('product.index')->with('danger', 'Product Deleted');
    }
}
