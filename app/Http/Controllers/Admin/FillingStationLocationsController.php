<?php

namespace App\Http\Controllers\Admin;

use App\Models\FillingStationLocations;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FillingStationLocationsController extends Controller
{
    public function index()
    {
        $data = FillingStationLocations::all();
        return view('admin.filling_station_locations.index', compact("data"));
    }

    public function create()
    {
        return view('admin.filling_station_locations.create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'priority' => 'required|string|max:255',
            'heading' => 'required|string',

        ]);

      

        FillingStationLocations::create($data);

        return redirect()->route('filling_station_locations.index')->with('success', 'New Information Added');
    }

    public function edit($id)
{
    $data = FillingStationLocations::findOrFail($id);
    return view('admin.filling_station_locations.edit', compact('data'));
}

public function update(Request $request, $id)
{

    $data = $this->validate($request, [
        'priority' => 'required|string|max:255',
        'heading' => 'required|string',
    ]);

    
    $about = FillingStationLocations::findOrFail($id);

 
    // if ($request->hasFile('image')) {
    //     if ($about->image) {
    //         $oldFilePath = public_path('uploads/governace/' . $about->image);
    //         if (file_exists($oldFilePath)) {
    //             unlink($oldFilePath);
    //         }
    //     }
    //     $image = 'image_' . time() . '.' . $request->image->extension();
    //     $data['image'] = $image;
    //     $request->image->move(public_path('uploads/governace'), $image);
    // }

    // if ($request->hasFile('image_2')) {
    //     if ($about->image_2) {
    //         $oldFilePath = public_path('uploads/governace/' . $about->image_2);
    //         if (file_exists($oldFilePath)) {
    //             unlink($oldFilePath);
    //         }
    //     }
    //     $image_2 = 'image_2_' . time() . '.' . $request->image_2->extension();
    //     $data['image_2'] = $image_2;
    //     $request->image_2->move(public_path('uploads/governace/'), $image_2);
    // }


    $about->update($data);

    // return redirect()->back()->with('success', 'Governance Updated Successfully');
    return redirect()->route('filling_station_locations.index')->with('success', 'Information Updated');

    
}


    public function destroy($id)
    {
        $about = FillingStationLocations::findOrFail($id);

        // Delete the old images if they exist
        // if ($about->image) {
        //     $oldFilePath = public_path('uploads/governace/' . $about->image);
        //     if (file_exists($oldFilePath)) {
        //         unlink($oldFilePath);
        //     }
        // }
        // if ($about->image_2) {
        //     $oldFilePath = public_path('uploads/governace/' . $about->image_2);
        //     if (file_exists($oldFilePath)) {
        //         unlink($oldFilePath);
        //     }
        // }
        // if ($about->mission_image) {
        //     $oldFilePath = public_path('uploads/about/' . $about->experienceiconimage);
        //     if (file_exists($oldFilePath)) {
        //         unlink($oldFilePath);
        //     }
        // }
        // if ($about->vision_icon_image) {
        //     $oldFilePath = public_path('uploads/about/' . $about->vision_icon_image);
        //     if (file_exists($oldFilePath)) {
        //         unlink($oldFilePath);
        //     }
        // }
        // if ($about->mission_icon_image) {
        //     $oldFilePath = public_path('uploads/about/' . $about->mission_icon_image);
        //     if (file_exists($oldFilePath)) {
        //         unlink($oldFilePath);
        //     }
        // }

        $about->delete();
        return redirect()->back()->with('danger', 'Deleted Successfully');
    }
}
