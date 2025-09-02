<?php

namespace App\Http\Controllers\Admin;

use App\Models\HomeService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeServicesController extends Controller
{
    public function index()
    {
        $data = HomeService::all();
        return view('admin.home_page_services.index', compact("data"));
    }

    public function create()
    {
        return view('admin.home_page_services.create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
            'short_description' => 'required|string',
            'image2' => 'required|mimes:jpg,jpeg,png,gif',
        ]);

        if ($request->hasFile('image')) {
            $image = 'record' . rand() . '.' . $request->image->extension();
            $data['image'] = $image;
            $request->image->move(public_path('uploads/home_page_services/'), $image);
        }

        // if ($request->hasFile('image2')) {
        //     $image2 = 'home_about2' . rand() . '.' . $request->image2->extension();
        //     $data['image2'] = $image2;
        //     $request->image2->move(public_path('uploads/home_page_services/'), $image2);
        // }

        HomeService::create($data);

        return redirect()->route('home_page_services.index')->with('success', 'New Content Added');
    }

    public function edit($id)
    {
        $data = HomeService::where('id', $id)->first();
        return view('admin.home_page_services.edit', compact('data'));
    }

    // public function update(Request $request, $id)
    // {
    //     $data = $this->validate($request, [
    //         'short_description' => 'required|string',
    //         'heading' => 'required|string',
    //         'heading2' => 'required|string',
    //         'priority' => 'required|string',
    //     ]);

    //     $record = HomeService::findOrFail($id);


    //     // if ($request->hasFile('image')) {

    //     //     if ($record->image) {
    //     //         $oldImagePath = public_path('uploads/home_page_services/' . $record->image);
    //     //         if (file_exists($oldImagePath)) {
    //     //             unlink($oldImagePath);
    //     //         }
    //     //     }

    //     //     $image = $request->file('image');
    //     //     $imageName = time() . '_image1.' . $image->getClientOriginalExtension();
    //     //     $imagePath = public_path('/uploads/home_page_services/');
    //     //     $image->move($imagePath, $imageName);
    //     //     $data['image'] = $imageName;
    //     // }

    //     // Handle the image2 upload
    //     // if ($request->hasFile('image2')) {
    //     //   if ($record->image2) {
    //     //     $oldImagePath2 = public_path('uploads/why_choose_us/' . $record->image2);
    //     //     if (file_exists($oldImagePath2)) {
    //     //       unlink($oldImagePath2);
    //     //     }
    //     //   }

    //     //   $image2 = $request->file('image2');
    //     //   $imageName2 = time() . '_image2.' . $image2->getClientOriginalExtension();
    //     //   $imagePath2 = public_path('/uploads/why_choose_us/');
    //     //   $image2->move($imagePath2, $imageName2);
    //     //   $data['image2'] = $imageName2;
    //     // }

    //     $record->update($data);

    //     return redirect()->route('home_page_services.index')->with('primary', 'Updated Successfully');
    // }
public function update(Request $request, $id)
{
    $data = $request->validate([
        'short_description' => 'nullable|string',
        'heading' => 'nullable|string',
        'heading2' => 'nullable|string',
        'priority' => 'nullable|string',
        'image' => 'nullable|mimes:jpg,jpeg,png,gif',
        'image2' => 'nullable|mimes:jpg,jpeg,png,gif',
    ]);

    // Apply default fallback values if not provided
    $data['short_description'] = $data['short_description'] ?? '';
    $data['heading'] = $data['heading'] ?? '';
    $data['heading2'] = $data['heading2'] ?? '';
    $data['priority'] = $data['priority'] ?? '';

    $record = HomeService::findOrFail($id);

    // Handle image1 upload
    if ($request->hasFile('image')) {
        if ($record->image) {
            $oldImagePath = public_path('uploads/home_page_services/' . $record->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        $image = $request->file('image');
        $imageName = time() . '_image1.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/home_page_services/'), $imageName);
        $data['image'] = $imageName;
    }

    // Handle image2 upload
    if ($request->hasFile('image2')) {
        if ($record->image2) {
            $oldImagePath2 = public_path('uploads/why_choose_us/' . $record->image2);
            if (file_exists($oldImagePath2)) {
                unlink($oldImagePath2);
            }
        }

        $image2 = $request->file('image2');
        $imageName2 = time() . '_image2.' . $image2->getClientOriginalExtension();
        $image2->move(public_path('uploads/why_choose_us/'), $imageName2);
        $data['image2'] = $imageName2;
    }

    $record->update($data);

    return redirect()->route('home_page_services.index')->with('primary', 'Updated Successfully');
}

    public function destroy($id)
    {
        $record = HomeService::findOrFail($id);
        // Delete the old image file if it exists
        if ($record->image) {
            $oldImagePath = public_path('uploads/home_page_services/' . $record->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        // Delete the old image2 file if it exists
        // if ($record->image2) {
        //   $oldImagePath2 = public_path('uploads/why_choose_us/' . $record->image2);
        //   if (file_exists($oldImagePath2)) {
        //     unlink($oldImagePath2);
        //   }
        // }

        $record->delete();
        return redirect()->back()->with('danger', 'Content Deleted Successfully');
    }
}
