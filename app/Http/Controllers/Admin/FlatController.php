<?php

namespace App\Http\Controllers\Admin;

use App\Models\Property;
use App\Models\Flat;
use App\Models\FlatSlide;
use App\Http\Controllers\Controller;
use App\PortfolioImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class FlatController extends Controller
{
    //
    public function index()
    {
        $data = Flat::orderby('created_at', 'DESC')->get();
        return view('admin.flat.index', compact('data'));
    }

    public function create()
    {
        $categories = Property::all();
        return view('admin.flat.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'flat_id' => 'required',
            'property_name' => 'required',
            'image' => 'required|mimes:png,jpg',
            'image2' => 'required|mimes:png,jpg',
            'status' => 'required',
        ]);

        
        // Handle the header image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $header_name = time() . 've.' . $image->getClientOriginalExtension();
            $header_path = public_path('/uploads/flats/');
            $image->move($header_path, $header_name);
            $data['image'] = $header_name;
        }

        // Handle the header image upload
        if ($request->hasFile('image2')) {
            $image2 = $request->file('image2');
            $header_name = time() . 'vasse.' . $image2->getClientOriginalExtension();
            $header_path = public_path('/uploads/flats/');
            $image2->move($header_path, $header_name);
            $data['image2'] = $header_name;
        }

        // dd($data);

        Flat::create($data);

        return redirect()->route('flat.index')->with('success', 'New Flat Added');
    }


    public function edit($id)
    {
        $data = Flat::where('id', $id)->first();
        $categories = Property::all();
        return view('admin.flat.edit', compact('data', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            
          'flat_id' => 'required',
          'property_name' => 'required',
          'image' => 'nullable|mimes:png,jpg',
          'image2' => 'nullable|mimes:png,jpg',
          'status' => 'required',
        ]);

        $flat = Flat::find($id);


        // Handle the header image upload
        if ($request->hasFile('image')) {
            // Delete the old header image if it exists
            if ($flat->image) {
                $oldHeaderPath = public_path('uploads/flats/' . $flat->image);
                if (file_exists($oldHeaderPath)) {
                    unlink($oldHeaderPath);
                }
            }

            // Upload the new header image
            $image = $request->file('image');
            $header_name = time() . 've.' . $image->getClientOriginalExtension();
            $header_path = public_path('/uploads/flats/');
            $image->move($header_path, $header_name);
            $data['image'] = $header_name;
        }

        // Handle the header image upload
        if ($request->hasFile('image2')) {
            // Delete the old header image2 if it exists
            if ($flat->image2) {
                $oldHeaderPath = public_path('uploads/flats/' . $flat->image2);
                if (file_exists($oldHeaderPath)) {
                    unlink($oldHeaderPath);
                }
            }

            // Upload the new header image2
            $image2 = $request->file('image2');
            $header_name = time() . 'vssde.' . $image2->getClientOriginalExtension();
            $header_path = public_path('/uploads/flats/');
            $image2->move($header_path, $header_name);
            $data['image2'] = $header_name;
        }

        // Generate the slug from the title
        // $data['slug'] = Str::slug($request->title, '-');

        $flat->update($data);

        return redirect()->route('flat.index')->with('success', 'Flat Data Updated :)');
    }

    public function destroy($id)
    {
        $flat = Flat::findOrFail($id);

        // Delete the thumbnail image if it exists
        if ($flat->image) {
            $oldThumbnailPath = public_path('uploads/flats/' . $flat->image);
            if (file_exists($oldThumbnailPath)) {
                unlink($oldThumbnailPath);
            }
        }
        // Delete the thumbnail image if it exists
        if ($flat->image2) {
            $oldThumbnailPath = public_path('uploads/flats/' . $flat->image2);
            if (file_exists($oldThumbnailPath)) {
                unlink($oldThumbnailPath);
            }
        }

        
        $flat->delete();

        return redirect()->route('flat.index')->with('danger', 'Flat Deleted');
    }

    
  public function slide_index($id)
  {
    $data = FlatSlide::where('flat_id', $id)->get();
    return view('admin.flat.slide', compact('data', 'id'));
  }
  public function slide_edit($id)
  {
    $data = FlatSlide::where('id', $id)->first();
    return view('admin.flat.slide-edit', compact('data'));
  }

  public function slide_store(Request $request)
  {
    // 
    $data = $this->validate($request, [
      'flat_id' => 'required',
      'image' => 'required',
    ]);

    // Handle the thumbnail image upload
    if ($request->hasFile('image')) {
      $image = $request->file('image');
      $thumbnail_name = time() . 'slide.' . $image->getClientOriginalExtension();
      $thumbnail_path = public_path('/uploads/flats/');
      $image->move($thumbnail_path, $thumbnail_name);
      $data['image'] = $thumbnail_name;
    }

    FlatSlide::create($data);

    return redirect()->back()->with('success', 'New FlatSlide Added');
  }

  public function slide_update(Request $request, $id)
  {
    // var_dump($request);
    $data = $this->validate($request, [
      'image' => 'nullable',
    ]);

    $record = FlatSlide::find($id);

    // Handle the thumbnail image upload
    if ($request->hasFile('image')) {
      // Delete the old thumbnail image if it exists
      $oldThumbnailPath = public_path('uploads/flats/' . $record->image);
      if ($record->image) {
        if (file_exists($oldThumbnailPath)) {
          unlink($oldThumbnailPath);
        }
      }
      // Upload the new thumbnail image
      $image = $request->file('image');
      $thumbnail_name = time() . 'eq.' . $image->getClientOriginalExtension();
      $thumbnail_path = public_path('/uploads/flats/');
      $image->move($thumbnail_path, $thumbnail_name);
      $data['image'] = $thumbnail_name;
    }

    $record->update($data);

    return redirect()->route('flat.slide_index', $request->flat_id)->with('primary', 'FlatSlide Data Updated :)');
  }

  public function slide_destroy($id)
  {
    $record = FlatSlide::findOrFail($id);

    // Delete the thumbnail image if it exists
    if ($record->image) {
      $oldThumbnailPath = public_path('uploads/flats/' . $record->image);
      if (file_exists($oldThumbnailPath)) {
        unlink($oldThumbnailPath);
      }

      $record->delete();

      return redirect()->back()->with('danger', 'FlatSlide Deleted successfully');
    }
  }
}
