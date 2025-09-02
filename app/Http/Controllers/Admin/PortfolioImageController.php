<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Portfolio;
use App\Http\Controllers\Controller;
use App\Models\PortfolioImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PortfolioImageController extends Controller
{
    //
    public function index()
    {
        $data = Portfolio::orderby('created_at', 'DESC')->get();
        return view('admin.portfolio_image.index', compact('data'));
    }


    public function edit($id)
    {
        $data = Portfolio::where('id', $id)->first();
        $portfolio_images = PortfolioImage::where('portfolio_id', $id)->get();
        // $categories = Category::all();
        return view('admin.portfolio_image.edit', compact('data', 'portfolio_images'));
    }
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'image' => 'required',
        ]);

        // Handle the thumbnail image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $thumbnail_name = time() . 'image.' . $image->getClientOriginalExtension();
            $thumbnail_path = public_path('/uploads/portfolio/');
            $image->move($thumbnail_path, $thumbnail_name);
            $data['image'] = $thumbnail_name;
        }
        
        $data['portfolio_id'] = $request->portfolio_id;

        PortfolioImage::create($data);

        return redirect()->back()->with('success', 'New Image Added');
    }
    public function destroy($id)
    {
        // return("Coming in destory");
        $portfolio_image = PortfolioImage::findOrFail($id);

        if ($portfolio_image->image) {
            $oldThumbnailPath = public_path('uploads/portfolio/' . $portfolio_image->image);
            if (file_exists($oldThumbnailPath)) {
                unlink($oldThumbnailPath);
            }
        }

        $portfolio_image->delete();
        // return response()->json(['success' => true]);
        return redirect()->back()->with('danger', 'Portfolio Image Deleted');
    }
}
