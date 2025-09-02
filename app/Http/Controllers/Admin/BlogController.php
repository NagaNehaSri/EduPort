<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class BlogController extends Controller
{
  //
  public function index()
  {
    $data = Blog::orderby('id', 'DESC')->get();
    return view('admin.blog.index', compact('data'));
  }

  public function create()
  {
    return view('admin.blog.create');
  }

  public function store(Request $request)
  {
    $data = $this->validate($request, [
      'title' => 'required|unique:blogs',
      'date' => 'required',
      'description' => 'required',
      'bottom_description' => 'required',
      // 'category' => 'required',
      // 'status' => 'required',
      'thumbnail_image' => 'required',
      'header_image' => 'required',
      'view_image' => 'required',
      // 'view_image_2' => 'required',
      // 'blog_page_short_description'=> 'required',
    ]);

    // Handle the thumbnail image upload
    if ($request->hasFile('thumbnail_image')) {
      $thumbnail_image = $request->file('thumbnail_image');
      $thumbnail_name = time() . 'th.' . $thumbnail_image->getClientOriginalExtension();
      $thumbnail_path = public_path('/uploads/blogs/');
      $thumbnail_image->move($thumbnail_path, $thumbnail_name);
      $data['thumbnail_image'] = $thumbnail_name;
    }

    // Handle the header image upload
    if ($request->hasFile('header_image')) {
      $header_image = $request->file('header_image');
      $header_name = time() . 'he.' . $header_image->getClientOriginalExtension();
      $header_path = public_path('/uploads/blogs/');
      $header_image->move($header_path, $header_name);
      $data['header_image'] = $header_name;
    }

    // Handle the header image upload
    if ($request->hasFile('view_image')) {
      $view_image = $request->file('view_image');
      $header_name = time() . 've.' . $view_image->getClientOriginalExtension();
      $header_path = public_path('/uploads/blogs/');
      $view_image->move($header_path, $header_name);
      $data['view_image'] = $header_name;
    }


    if ($request->hasFile('view_image_2')) {
      $view_image_2 = $request->file('view_image_2');
      $header_name = time() . 've.' . $view_image_2->getClientOriginalExtension();
      $header_path = public_path('/uploads/blogs/');
      $view_image_2->move($header_path, $header_name);
      $data['view_image_2'] = $header_name;
    }

    // Generate the slug from the title
    $data['slug'] = Str::slug($request->title, '-');

    Blog::create($data);

    return redirect()->route('blog.index')->with('success', 'New Blog Added');
  }


  public function edit($id)
  {
    $data = Blog::where('id', $id)->first();
    return view('admin.blog.edit', compact('data'));
  }

  public function update(Request $request, $id)
  {
    $data = $this->validate($request, [
      'title' => 'required',
      'date' => 'required',
      'description' => 'required',
      // 'status' => 'required',
      // 'category' => 'required',
      'bottom_description' => 'required',
      // 'blog_page_short_description'=> 'required',
    ]);

    $blog = Blog::find($id);

    // Handle the thumbnail image upload
    if ($request->hasFile('thumbnail_image')) {
      // Delete the old thumbnail image if it exists
      if ($blog->thumbnail_image) {
        $oldThumbnailPath = public_path('uploads/blogs/' . $blog->thumbnail_image);
        if (file_exists($oldThumbnailPath)) {
          unlink($oldThumbnailPath);
        }
      }

      // Upload the new thumbnail image
      $thumbnail_image = $request->file('thumbnail_image');
      $thumbnail_name = time() . 'th.' . $thumbnail_image->getClientOriginalExtension();
      $thumbnail_path = public_path('/uploads/blogs/');
      $thumbnail_image->move($thumbnail_path, $thumbnail_name);
      $data['thumbnail_image'] = $thumbnail_name;
    }

    // Handle the header image upload
    if ($request->hasFile('header_image')) {
      // Delete the old header image if it exists
      if ($blog->header_image) {
        $oldHeaderPath = public_path('uploads/blogs/' . $blog->header_image);
        if (file_exists($oldHeaderPath)) {
          unlink($oldHeaderPath);
        }
      }

      // Upload the new header image
      $header_image = $request->file('header_image');
      $header_name = time() . 'he.' . $header_image->getClientOriginalExtension();
      $header_path = public_path('/uploads/blogs/');
      $header_image->move($header_path, $header_name);
      $data['header_image'] = $header_name;
    }

    // Handle the header image upload
    if ($request->hasFile('view_image')) {
      // Delete the old header image if it exists
      if ($blog->view_image) {
        $oldHeaderPath = public_path('uploads/blogs/' . $blog->view_image);
        if (file_exists($oldHeaderPath)) {
          unlink($oldHeaderPath);
        }
      }

      // Upload the new header image
      $view_image = $request->file('view_image');
      $header_name = time() . 've.' . $view_image->getClientOriginalExtension();
      $header_path = public_path('/uploads/blogs/');
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

    return redirect()->route('blog.index')->with('primary', 'Blog Data Updated :)');
  }

  public function destroy($id)
  {
    $blog = Blog::findOrFail($id);

    // Delete the thumbnail image if it exists
    if ($blog->thumbnail_image) {
      $oldThumbnailPath = public_path('uploads/blogs/' . $blog->thumbnail_image);
      if (file_exists($oldThumbnailPath)) {
        unlink($oldThumbnailPath);
      }
    }

    // Delete the header image if it exists
    if ($blog->header_image) {
      $oldHeaderPath = public_path('uploads/blogs/' . $blog->header_image);
      if (file_exists($oldHeaderPath)) {
        unlink($oldHeaderPath);
      }
    }

    if ($blog->view_image) {
      $oldHeaderPath = public_path('uploads/blogs/' . $blog->view_image);
      if (file_exists($oldHeaderPath)) {
        unlink($oldHeaderPath);
      }
    }

    $blog->delete();

    return redirect()->route('blog.index')->with('danger', 'Blog Deleted');
  }
}
