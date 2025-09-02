<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
  public function index()
  {
    $data = Service::orderby('id', 'DESC')->get();
    return view('admin.service.index', compact('data'));
  }

  public function create()
  {
    return view('admin.service.create');
  }

  public function store(Request $request)
  {
    $data = $this->validate($request, [
      'service_name' => 'required',
     
      'service_page_short_description' => 'required',
      'thumbnail_image' => 'required',
      // 'icon_image' => 'nullable',
      'heading_1' => 'required',
      'description_1' => 'required',
      'view_image' => 'required',
      'priority'=> 'required',
      // 'heading_2' => 'required',
      // 'description_2' => 'required',
      // 'heading_3'=>'required',
    ]);

    // Handle the thumbnail image upload
    if ($request->hasFile('thumbnail_image')) {
      $thumbnail_image = $request->file('thumbnail_image');
      $thumbnail_name = time() . 'th.' . $thumbnail_image->getClientOriginalExtension();
      $thumbnail_path = public_path('/uploads/service/');
      $thumbnail_image->move($thumbnail_path, $thumbnail_name);
      $data['thumbnail_image'] = $thumbnail_name;
    }

    // Handle the icon image upload
    // if ($request->hasFile('icon_image')) {
    //   $icon_image = $request->file('icon_image');
    //   $icon_name = time() . 'ic.' . $icon_image->getClientOriginalExtension();
    //   $icon_path = public_path('/uploads/service/');
    //   $icon_image->move($icon_path, $icon_name);
    //   $data['icon_image'] = $icon_name;
    // }

    // Handle the view image upload
    if ($request->hasFile('view_image')) {
      $view_image = $request->file('view_image');
      $view_name = time() . 've.' . $view_image->getClientOriginalExtension();
      $view_path = public_path('/uploads/service/');
      $view_image->move($view_path, $view_name);
      $data['view_image'] = $view_name;
    }

    // Generate the slug from the service name
    $data['slug'] = Str::slug($request->service_name, '-');

    Service::create($data);

    return redirect()->route('service.index')->with('success', 'New Service Added');
  }

  public function edit($id)
  {
    $data = Service::where('id', $id)->first();
    return view('admin.service.edit', compact('data'));
  }

  public function update(Request $request, $id)
  {
    $data = $this->validate($request, [
      'service_name' => 'required',
     
      'service_page_short_description' => 'required',
      'thumbnail_image' => 'nullable',
      // 'icon_image' => 'nullable',
      'heading_1' => 'required',
      'description_1' => 'required',
      'view_image' => 'nullable',
      'priority'=> 'required',
      // 'heading_2' => 'required',
      // 'description_2' => 'required',
      // 'heading_3'=>'required',
    ]);

    $service = Service::find($id);

    // Handle the thumbnail image upload
    if ($request->hasFile('thumbnail_image')) {
      if ($service->thumbnail_image) {
        $oldPath = public_path('uploads/service/' . $service->thumbnail_image);
        if (file_exists($oldPath)) {
          unlink($oldPath);
        }
      }

      $thumbnail_image = $request->file('thumbnail_image');
      $thumbnail_name = time() . 'th.' . $thumbnail_image->getClientOriginalExtension();
      $thumbnail_path = public_path('/uploads/service/');
      $thumbnail_image->move($thumbnail_path, $thumbnail_name);
      $data['thumbnail_image'] = $thumbnail_name;
    }

    // Handle the icon image upload
    // if ($request->hasFile('icon_image')) {
    //   if ($service->icon_image) {
    //     $oldPath = public_path('uploads/service/' . $service->icon_image);
    //     if (file_exists($oldPath)) {
    //       unlink($oldPath);
    //     }
    //   }

    //   $icon_image = $request->file('icon_image');
    //   $icon_name = time() . 'ic.' . $icon_image->getClientOriginalExtension();
    //   $icon_path = public_path('/uploads/service/');
    //   $icon_image->move($icon_path, $icon_name);
    //   $data['icon_image'] = $icon_name;
    // }

    // Handle the view image upload
    if ($request->hasFile('view_image')) {
      if ($service->view_image) {
        $oldPath = public_path('uploads/service/' . $service->view_image);
        if (file_exists($oldPath)) {
          unlink($oldPath);
        }
      }

      $view_image = $request->file('view_image');
      $view_name = time() . 've.' . $view_image->getClientOriginalExtension();
      $view_path = public_path('/uploads/service/');
      $view_image->move($view_path, $view_name);
      $data['view_image'] = $view_name;
    }

    // Generate the slug from the service name
    $data['slug'] = Str::slug($request->service_name, '-');

    $service->update($data);

    return redirect()->route('service.index')->with('primary', 'Service Data Updated');
  }

  public function destroy($id)
  {
    $service = Service::findOrFail($id);

    // Delete the images if they exist
    if ($service->thumbnail_image) {
      $oldPath = public_path('uploads/service/' . $service->thumbnail_image);
      if (file_exists($oldPath)) {
        unlink($oldPath);
      }
    }

    // if ($service->icon_image) {
    //   $oldPath = public_path('uploads/service/' . $service->icon_image);
    //   if (file_exists($oldPath)) {
    //     unlink($oldPath);
    //   }
    // }

    if ($service->view_image) {
      $oldPath = public_path('uploads/service/' . $service->view_image);
      if (file_exists($oldPath)) {
        unlink($oldPath);
      }
    }

    $service->delete();

    return redirect()->route('service.index')->with('danger', 'Service Deleted');
  }
}
