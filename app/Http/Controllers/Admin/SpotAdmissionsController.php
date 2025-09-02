<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SpotAdmissions;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SpotAdmissionsController extends Controller
{
    public function index()
    {
        $data = SpotAdmissions::orderby('id', 'DESC')->get();
        return view('admin.spot_admissions.index', compact('data'));
    }

    public function create()
    {
        return view('admin.spot_admissions.create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'category_id' => 'required',
            'hero_heading' => 'required',
            'hero_description' => 'required',
            'hero_image' => 'required',
            'hero_heading_2' => 'required',
            'hero_description_2' => 'required',
            'hero_image_2' => 'required',
            'title' => 'required',
            'date' => 'required',
            'thumbnail_image' => 'required',
            'view_image' => 'required',
            'bottom_description' => 'required',
            'short_description' => 'required',
            // 'title' => 'required|unique:blogs',
            // 'date' => 'required',

            // 'bottom_description' => 'required',

            // 'thumbnail_image' => 'required',
            // 'header_image' => 'required',
            // 'view_image' => 'required',

        ]);

        // Handle the thumbnail image upload
        if ($request->hasFile('thumbnail_image')) {
            $thumbnail_image = $request->file('thumbnail_image');
            $thumbnail_name = time() . '_thumb.' . $thumbnail_image->getClientOriginalExtension();
            $thumbnail_path = public_path('/uploads/spot_admissions/');
            $thumbnail_image->move($thumbnail_path, $thumbnail_name);
            $data['thumbnail_image'] = $thumbnail_name;
        }
        
        if ($request->hasFile('hero_image')) {
            $hero_image = $request->file('hero_image');
            $hero_image_name = time() . '_hero1.' . $hero_image->getClientOriginalExtension();
            $hero_image_path = public_path('/uploads/spot_admissions/');
            $hero_image->move($hero_image_path, $hero_image_name);
            $data['hero_image'] = $hero_image_name;
        }
        
        if ($request->hasFile('hero_image_2')) {
            $hero_image_2 = $request->file('hero_image_2');
            $hero_image_name_2 = time() . '_hero2.' . $hero_image_2->getClientOriginalExtension();
            $hero_image_path_2 = public_path('/uploads/spot_admissions/');
            $hero_image_2->move($hero_image_path_2, $hero_image_name_2);
            $data['hero_image_2'] = $hero_image_name_2;
        }
        
        if ($request->hasFile('view_image')) {
            $view_image = $request->file('view_image');
            $view_image_name = time() . '_view.' . $view_image->getClientOriginalExtension();
            $view_image_path = public_path('/uploads/spot_admissions/');
            $view_image->move($view_image_path, $view_image_name);
            $data['view_image'] = $view_image_name;
        }
        


        // if ($request->hasFile('view_image_2')) {
        //     $view_image_2 = $request->file('view_image_2');
        //     $header_name = time() . 've.' . $view_image_2->getClientOriginalExtension();
        //     $header_path = public_path('/uploads/blogs/');
        //     $view_image_2->move($header_path, $header_name);
        //     $data['view_image_2'] = $header_name;
        // }

        // Generate the slug from the title
        $data['slug'] = Str::slug($request->title, '-');

        SpotAdmissions::create($data);

        return redirect()->route('spot_admissions.index')->with('success', 'New Blog Added');
    }


    public function edit($id)
    {
        $data = SpotAdmissions::where('id', $id)->first();
        return view('admin.spot_admissions.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'category_id' => 'required',
            'hero_heading' => 'required',
            'hero_description' => 'required',
            // 'hero_image'=> 'required',
            'hero_heading_2' => 'required',
            'hero_description_2' => 'required',
            // 'hero_image_2'=> 'required',
            'title' => 'required',
            'date' => 'required',
            // 'thumbnail_image'=> 'required',
            // 'view_image'=> 'required',
            'bottom_description' => 'required',
            'short_description' => 'required',
        ]);

        $blog = SpotAdmissions::find($id);

        // Handle the thumbnail image upload
        if ($request->hasFile('thumbnail_image')) {
            // Delete the old thumbnail image if it exists
            if ($blog->thumbnail_image) {
                $oldThumbnailPath = public_path('uploads/spot_admissions/' . $blog->thumbnail_image);
                if (file_exists($oldThumbnailPath)) {
                    unlink($oldThumbnailPath);
                }
            }

            // Upload the new thumbnail image
            $thumbnail_image = $request->file('thumbnail_image');
            $thumbnail_name = time() . 'th.' . $thumbnail_image->getClientOriginalExtension();
            $thumbnail_path = public_path('/uploads/spot_admissions/');
            $thumbnail_image->move($thumbnail_path, $thumbnail_name);
            $data['thumbnail_image'] = $thumbnail_name;
        }

        // Handle the header image upload
        if ($request->hasFile('hero_image')) {
            // Delete the old hero image if it exists
            if ($blog->hero_image) {
                $oldHeroPath = public_path('uploads/spot_admissions/' . $blog->hero_image);
                if (file_exists($oldHeroPath)) {
                    unlink($oldHeroPath);
                }
            }

            // Upload the new hero image
            $hero_image = $request->file('hero_image');
            $hero_name = time() . 'he.' . $hero_image->getClientOriginalExtension();
            $hero_path = public_path('/uploads/spot_admissions/');
            $hero_image->move($hero_path, $hero_name);
            $data['hero_image'] = $hero_name;
        }

        if ($request->hasFile('hero_image_2')) {
            // Delete the old hero image 2 if it exists
            if ($blog->hero_image_2) {
                $oldHero2Path = public_path('uploads/spot_admissions/' . $blog->hero_image_2);
                if (file_exists($oldHero2Path)) {
                    unlink($oldHero2Path);
                }
            }

            // Upload the new hero image 2
            $hero_image_2 = $request->file('hero_image_2');
            $hero2_name = time() . 'he2.' . $hero_image_2->getClientOriginalExtension();
            $hero2_path = public_path('/uploads/spot_admissions/');
            $hero_image_2->move($hero2_path, $hero2_name);
            $data['hero_image_2'] = $hero2_name;
        }


        // Handle the header image upload
        if ($request->hasFile('view_image')) {
            // Delete the old header image if it exists
            if ($blog->view_image) {
                $oldHeaderPath = public_path('uploads/spot_admissions/' . $blog->view_image);
                if (file_exists($oldHeaderPath)) {
                    unlink($oldHeaderPath);
                }
            }

            // Upload the new header image
            $view_image = $request->file('view_image');
            $header_name = time() . 've.' . $view_image->getClientOriginalExtension();
            $header_path = public_path('/uploads/spot_admissions/');
            $view_image->move($header_path, $header_name);
            $data['view_image'] = $header_name;
        }
        // if ($request->hasFile('view_image_2')) {

        //   if ($blog->view_image_2) {
        //     $oldHeaderPath = public_path('uploads/blogs/' . $blog->view_image_2);
        //     if (file_exists($oldHeaderPath)) {
        //       unlink($oldHeaderPath);
        //     }
        //   }


        //   $view_image_2 = $request->file('view_image_2');
        //   $header_name = time() . 'view_image_2.' . $view_image_2->getClientOriginalExtension();
        //   $header_path = public_path('/uploads/blogs/');
        //   $view_image_2->move($header_path, $header_name);
        //   $data['view_image_2'] = $header_name;
        // }
        // Generate the slug from the title
        $data['slug'] = Str::slug($request->title, '-');

        $blog->update($data);

        return redirect()->route('spot_admissions.index')->with('primary', 'Blog Data Updated :)');
    }

    public function destroy($id)
    {
        $blog = SpotAdmissions::findOrFail($id);

        // Delete the thumbnail image if it exists
        if ($blog->thumbnail_image) {
            $oldThumbnailPath = public_path('uploads/spot_admissions/' . $blog->thumbnail_image);
            if (file_exists($oldThumbnailPath)) {
                unlink($oldThumbnailPath);
            }
        }

        // Delete the header image if it exists
        if ($blog->hero_image) {
            $oldHeaderPath = public_path('uploads/spot_admissions/' . $blog->hero_image);
            if (file_exists($oldHeaderPath)) {
                unlink($oldHeaderPath);
            }
        }
        if ($blog->hero_image_2) {
            $oldHeaderPath = public_path('uploads/spot_admissions/' . $blog->hero_image_2);
            if (file_exists($oldHeaderPath)) {
                unlink($oldHeaderPath);
            }
        }

        if ($blog->view_image) {
            $oldHeaderPath = public_path('uploads/spot_admissions/' . $blog->view_image);
            if (file_exists($oldHeaderPath)) {
                unlink($oldHeaderPath);
            }
        }

        $blog->delete();

        return redirect()->route('spot_admissions.index')->with('danger', 'Blog Deleted');
    }
}
