<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Portfolio;
use App\Http\Controllers\Controller;
use App\Models\PortfolioImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PortfolioController extends Controller
{
    //
    public function index()
    {
        $data = Portfolio::orderby('created_at', 'DESC')->get();
        return view('admin.portfolio.index', compact('data'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.portfolio.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => 'required|unique:portfolio',
            'client' => 'required',
            'architect' => 'required',
            'location' => 'required',
            'category' => 'required',
            'description' => 'required',
            'status' => 'required',
            'thumbnail_image' => 'required',
            'header_image' => 'required',
            'view_image' => 'required',
        ]);

        // Handle the thumbnail image upload
        if ($request->hasFile('thumbnail_image')) {
            $thumbnail_image = $request->file('thumbnail_image');
            $thumbnail_name = time() . 'th.' . $thumbnail_image->getClientOriginalExtension();
            $thumbnail_path = public_path('/uploads/');
            $thumbnail_image->move($thumbnail_path, $thumbnail_name);
            $data['thumbnail_image'] = $thumbnail_name;
        }

        // Handle the header image upload
        if ($request->hasFile('header_image')) {
            $header_image = $request->file('header_image');
            $header_name = time() . 'he.' . $header_image->getClientOriginalExtension();
            $header_path = public_path('/uploads/');
            $header_image->move($header_path, $header_name);
            $data['header_image'] = $header_name;
        }

        // Handle the header image upload
        if ($request->hasFile('view_image')) {
            $view_image = $request->file('view_image');
            $header_name = time() . 've.' . $view_image->getClientOriginalExtension();
            $header_path = public_path('/uploads/');
            $view_image->move($header_path, $header_name);
            $data['view_image'] = $header_name;
        }

        // Generate the slug from the title
        $data['slug'] = Str::slug($request->title, '-');

        Portfolio::create($data);

        return redirect()->route('portfolio.index')->with('success', 'New Portfolio Added');
    }


    public function edit($id)
    {
        $data = Portfolio::where('id', $id)->first();
        $categories = Category::all();
        return view('admin.portfolio.edit', compact('data', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'client' => 'required',
            'architect' => 'required',
            'location' => 'required',
            'category' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        $portfolio = Portfolio::find($id);

        // Handle the thumbnail image upload
        if ($request->hasFile('thumbnail_image')) {
            // Delete the old thumbnail image if it exists
            if ($portfolio->thumbnail_image) {
                $oldThumbnailPath = public_path('uploads/' . $portfolio->thumbnail_image);
                if (file_exists($oldThumbnailPath)) {
                    unlink($oldThumbnailPath);
                }
            }

            // Upload the new thumbnail image
            $thumbnail_image = $request->file('thumbnail_image');
            $thumbnail_name = time() . 'th.' . $thumbnail_image->getClientOriginalExtension();
            $thumbnail_path = public_path('/uploads/');
            $thumbnail_image->move($thumbnail_path, $thumbnail_name);
            $data['thumbnail_image'] = $thumbnail_name;
        }

        // Handle the header image upload
        if ($request->hasFile('header_image')) {
            // Delete the old header image if it exists
            if ($portfolio->header_image) {
                $oldHeaderPath = public_path('uploads/' . $portfolio->header_image);
                if (file_exists($oldHeaderPath)) {
                    unlink($oldHeaderPath);
                }
            }

            // Upload the new header image
            $header_image = $request->file('header_image');
            $header_name = time() . 'he.' . $header_image->getClientOriginalExtension();
            $header_path = public_path('/uploads/');
            $header_image->move($header_path, $header_name);
            $data['header_image'] = $header_name;
        }

        // Handle the header image upload
        if ($request->hasFile('view_image')) {
            // Delete the old header image if it exists
            if ($portfolio->view_image) {
                $oldHeaderPath = public_path('uploads/' . $portfolio->view_image);
                if (file_exists($oldHeaderPath)) {
                    unlink($oldHeaderPath);
                }
            }

            // Upload the new header image
            $view_image = $request->file('view_image');
            $header_name = time() . 've.' . $view_image->getClientOriginalExtension();
            $header_path = public_path('/uploads/');
            $view_image->move($header_path, $header_name);
            $data['view_image'] = $header_name;
        }

        // Generate the slug from the title
        $data['slug'] = Str::slug($request->title, '-');

        $portfolio->update($data);

        return redirect()->route('portfolio.index')->with('success', 'Portfolio Data Updated :)');
    }

    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        // Delete the thumbnail image if it exists
        if ($portfolio->thumbnail_image) {
            $oldThumbnailPath = public_path('uploads/' . $portfolio->thumbnail_image);
            if (file_exists($oldThumbnailPath)) {
                unlink($oldThumbnailPath);
            }
        }

        // Delete the header image if it exists
        if ($portfolio->header_image) {
            $oldHeaderPath = public_path('uploads/' . $portfolio->header_image);
            if (file_exists($oldHeaderPath)) {
                unlink($oldHeaderPath);
            }
        }

        $portfolio_images = PortfolioImage::where('portfolio_id', $id)->get();
        foreach ($portfolio_images as $image) {
            $oldImagePath = public_path('uploads/portfolio/' . $image->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath); // Delete the image file
            }
            $image->delete(); // Delete the portfolio image record
        }

        $portfolio->delete();

        return redirect()->route('portfolio.index')->with('danger', 'Portfolio Deleted');
    }
}
