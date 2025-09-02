<?php

namespace App\Http\Controllers\Admin;

use App\Models\Property;
use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PropertyController extends Controller
{
  public function index()
  {
    $data = Property::orderby('id', 'DESC')->get();
    return view('admin.property.index', compact('data'));
  }

  public function create()
  {
    return view('admin.property.create');
  }

  public function store(Request $request)
  {
    $data = $this->validate($request, [
      'name' => 'required',
      'description' => 'required',
      'address' => 'required',
      'side_facing' => 'required',
      'square_yards' => 'nullable|numeric',
      'square_feet' => 'nullable|numeric',
      'bedroom' => 'nullable|numeric',
      'bathroom' => 'nullable|numeric',
      'garages' => 'nullable|numeric',
      'year_built' => 'nullable|numeric',
      'contact_number' => 'required|numeric',
      'amount' => 'nullable|numeric',
      'thumbnail_image' => 'required|mimes:jpg,png,svg,webp',
      'slide_1' => 'required|mimes:jpg,png,svg,webp',
      'slide_2' => 'required|mimes:jpg,png,svg,webp',
      'project_complete_image' => 'required|mimes:jpg,png,svg,webp',
      'brochure' => 'nullable|mimes:pdf,docx',
      'status' => 'required',
      'iframe' => 'required',
      'completed' => 'required',
      'youtube_links' => 'nullable',
    ]);

    $features = implode(",",$request->features);
    $data['features'] = $features;
    // Handle the header image upload
    if ($request->hasFile('thumbnail_image')) {
      $thumbnail_image = $request->file('thumbnail_image');
      $header_name = time() . 'th.' . $thumbnail_image->getClientOriginalExtension();
      $header_path = public_path('/uploads/property/');
      $thumbnail_image->move($header_path, $header_name);
      $data['thumbnail_image'] = $header_name;
    }
    // Handle the header image upload
    if ($request->hasFile('slide_1')) {
      $slide_1 = $request->file('slide_1');
      $header_name = time() . 'he.' . $slide_1->getClientOriginalExtension();
      $header_path = public_path('/uploads/property/');
      $slide_1->move($header_path, $header_name);
      $data['slide_1'] = $header_name;
    }

    // Handle the header image upload
    if ($request->hasFile('slide_2')) {
      $slide_2 = $request->file('slide_2');
      $header_name = time() . 've.' . $slide_2->getClientOriginalExtension();
      $header_path = public_path('/uploads/property/');
      $slide_2->move($header_path, $header_name);
      $data['slide_2'] = $header_name;
    }

    // Handle the header image upload
    if ($request->hasFile('project_complete_image')) {
      $project_complete_image = $request->file('project_complete_image');
      $header_name = time() . 'project_complete_image.' . $project_complete_image->getClientOriginalExtension();
      $header_path = public_path('/uploads/property/');
      $project_complete_image->move($header_path, $header_name);
      $data['project_complete_image'] = $header_name;
    }

    // Handle the header image upload
    if ($request->hasFile('brochure')) {
      $brochure = $request->file('brochure');
      $header_name = time() . 'brochure.' . $brochure->getClientOriginalExtension();
      $header_path = public_path('/uploads/property/');
      $brochure->move($header_path, $header_name);
      $data['brochure'] = $header_name;
    }

    // Generate the slug from the title
    $data['slug'] = Str::slug($request->name, '-');

    Property::create($data);

    return redirect()->route('property.index')->with('success', 'New Property Added');
  }


  public function edit($id)
  {
    $data = Property::where('id', $id)->first();
    return view('admin.property.edit', compact('data'));
  }

  public function update(Request $request, $id)
  {
    $features = implode(",",$request->features);
    // dd($features);
    $data = $this->validate($request, [
      'name' => 'required',
      'description' => 'required',
      'address' => 'required',
      'side_facing' => 'required',
      'square_yards' => 'nullable|numeric',
      'square_feet' => 'nullable|numeric',
      'bedroom' => 'nullable|numeric',
      'bathroom' => 'nullable|numeric',
      'garages' => 'nullable|numeric',
      'year_built' => 'nullable|numeric',
      'contact_number' => 'required|numeric',
      'amount' => 'nullable|numeric',
      'thumbnail_image' => 'nullable|mimes:jpg,png,svg,webp',
      'slide_1' => 'nullable|mimes:jpg,png,svg,webp',
      'slide_2' => 'nullable|mimes:jpg,png,svg,webp',
      'project_complete_image' => 'nullable|mimes:jpg,png,svg,webp',
      'brochure' => 'nullable|mimes:pdf,docx',
      'status' => 'required',
      'iframe' => 'required',
      'completed' => 'required',
      'youtube_links' => 'nullable',
    ]);


    $property = Property::find($id);
    $data['features'] = $features;
    // Handle the header image upload
    if ($request->hasFile('thumbnail_image')) {
      // Delete the old header image if it exists
      if ($property->thumbnail_image) {
        $oldHeaderPath = public_path('uploads/property/' . $property->thumbnail_image);
        if (file_exists($oldHeaderPath)) {
          unlink($oldHeaderPath);
        }
      }

      // Upload the new header image
      $thumbnail_image = $request->file('thumbnail_image');
      $header_name = time() . 'th.' . $thumbnail_image->getClientOriginalExtension();
      $header_path = public_path('/uploads/property/');
      $thumbnail_image->move($header_path, $header_name);
      $data['thumbnail_image'] = $header_name;
    }
    // Handle the header image upload
    if ($request->hasFile('slide_1')) {
      // Delete the old header image if it exists
      if ($property->slide_1) {
        $oldHeaderPath = public_path('uploads/property/' . $property->slide_1);
        if (file_exists($oldHeaderPath)) {
          unlink($oldHeaderPath);
        }
      }

      // Upload the new header image
      $slide_1 = $request->file('slide_1');
      $header_name = time() . 'he.' . $slide_1->getClientOriginalExtension();
      $header_path = public_path('/uploads/property/');
      $slide_1->move($header_path, $header_name);
      $data['slide_1'] = $header_name;
    }

    // Handle the header image upload
    if ($request->hasFile('slide_2')) {
      // Delete the old header image if it exists
      if ($property->slide_2) {
        $oldHeaderPath = public_path('uploads/property/' . $property->slide_2);
        if (file_exists($oldHeaderPath)) {
          unlink($oldHeaderPath);
        }
      }

      // Upload the new header image
      $slide_2 = $request->file('slide_2');
      $header_name = time() . 've.' . $slide_2->getClientOriginalExtension();
      $header_path = public_path('/uploads/property/');
      $slide_2->move($header_path, $header_name);
      $data['slide_2'] = $header_name;
    }
    // Handle the header image upload
    if ($request->hasFile('project_complete_image')) {
      // Delete the old header image if it exists
      if ($property->project_complete_image) {
        $oldHeaderPath = public_path('uploads/property/' . $property->project_complete_image);
        if (file_exists($oldHeaderPath)) {
          unlink($oldHeaderPath);
        }
      }

      // Upload the new header image
      $project_complete_image = $request->file('project_complete_image');
      $header_name = time() . 'project_complete_image.' . $project_complete_image->getClientOriginalExtension();
      $header_path = public_path('/uploads/property/');
      $project_complete_image->move($header_path, $header_name);
      $data['project_complete_image'] = $header_name;
    }

    // Handle the header image upload
    if ($request->hasFile('brochure')) {
      // Delete the old header image if it exists
      if ($property->brochure) {
        $oldHeaderPath = public_path('uploads/property/' . $property->brochure);
        if (file_exists($oldHeaderPath)) {
          unlink($oldHeaderPath);
        }
      }

      // Upload the new header image
      $brochure = $request->file('brochure');
      $header_name = time() . 'brochure.' . $brochure->getClientOriginalExtension();
      $header_path = public_path('/uploads/property/');
      $brochure->move($header_path, $header_name);
      $data['brochure'] = $header_name;
    }

    

    // Generate the slug from the title
    $data['slug'] = Str::slug($request->name, '-');

    $property->update($data);

    return redirect()->route('property.index')->with('primary', 'Property Data Updated :)');
  }

  public function destroy($id)
  {
    $property = Property::findOrFail($id);

    // Delete the header image if it exists
    if ($property->thumbnail_image) {
      $oldHeaderPath = public_path('uploads/property/' . $property->thumbnail_image);
      if (file_exists($oldHeaderPath)) {
        unlink($oldHeaderPath);
      }
    }
    // Delete the header image if it exists
    if ($property->slide_1) {
      $oldHeaderPath = public_path('uploads/property/' . $property->slide_1);
      if (file_exists($oldHeaderPath)) {
        unlink($oldHeaderPath);
      }
    }

    if ($property->slide_2) {
      $oldHeaderPath = public_path('uploads/property/' . $property->slide_2);
      if (file_exists($oldHeaderPath)) {
        unlink($oldHeaderPath);
      }
    }

   
    $property->delete();

    return redirect()->route('property.index')->with('danger', 'Property Deleted');
  }

  // Additional slide

  public function slide_index($id)
  {
    $data = Slide::where('property_id', $id)->get();
    return view('admin.property.slide', compact('data', 'id'));
  }
  public function slide_edit($id)
  {
    $data = Slide::where('id', $id)->first();
    return view('admin.property.slide-edit', compact('data'));
  }

  public function slide_store(Request $request)
  {
    // 
    $data = $this->validate($request, [
      'property_id' => 'required',
      'image' => 'required',
    ]);

    // Handle the thumbnail image upload
    if ($request->hasFile('image')) {
      $image = $request->file('image');
      $thumbnail_name = time() . 'slide.' . $image->getClientOriginalExtension();
      $thumbnail_path = public_path('/uploads/property/');
      $image->move($thumbnail_path, $thumbnail_name);
      $data['image'] = $thumbnail_name;
    }

    Slide::create($data);

    return redirect()->back()->with('success', 'New Slide Added');
  }

  public function slide_update(Request $request, $id)
  {
    // var_dump($request);
    $data = $this->validate($request, [
      'image' => 'nullable',
    ]);

    $record = Slide::find($id);

    // Handle the thumbnail image upload
    if ($request->hasFile('image')) {
      // Delete the old thumbnail image if it exists
      $oldThumbnailPath = public_path('uploads/property/' . $record->image);
      if ($record->image) {
        if (file_exists($oldThumbnailPath)) {
          unlink($oldThumbnailPath);
        }
      }
      // Upload the new thumbnail image
      $image = $request->file('image');
      $thumbnail_name = time() . 'eq.' . $image->getClientOriginalExtension();
      $thumbnail_path = public_path('/uploads/property/');
      $image->move($thumbnail_path, $thumbnail_name);
      $data['image'] = $thumbnail_name;
    }

    $record->update($data);

    return redirect()->route('property.slide_index', $request->property_id)->with('primary', 'Slide Data Updated :)');
  }

  public function slide_destroy($id)
  {
    $record = Slide::findOrFail($id);

    // Delete the thumbnail image if it exists
    if ($record->image) {
      $oldThumbnailPath = public_path('uploads/property/' . $record->image);
      if (file_exists($oldThumbnailPath)) {
        unlink($oldThumbnailPath);
      }

      $record->delete();

      return redirect()->back()->with('danger', 'Slide Deleted successfully');
    }
  }
}
