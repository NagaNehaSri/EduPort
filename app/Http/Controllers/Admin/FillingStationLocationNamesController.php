<?php

namespace App\Http\Controllers\Admin;

use App\Models\FillingStationLocationNames;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FillingStationLocationNamesController extends Controller
{
    public function index(Request $request)
    {
        $filling_station_id = $request->filling_station_id;
        $data = FillingStationLocationNames::where('filling_station_id', $filling_station_id)->get();

        return view('admin.filling_station_location_names.index', compact("data", "filling_station_id"));
    }

    public function create(Request $request)
    {  
        $filling_station_id = $request->filling_station_id;
        return view('admin.filling_station_location_names.create', compact('filling_station_id'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'filling_station_id' => 'required',
            'title' => 'required',
            'short_description' => 'required', 
            'priority'=> 'required', 
        ]);
    

        FillingStationLocationNames::create($data);

        return redirect()->route('filling_station_location_names.index', ['filling_station_id' => $request->filling_station_id])
            ->with('success', 'New Content Added');
    }

    public function edit($id)
    {
        $data = FillingStationLocationNames::findOrFail($id);

        return view('admin.filling_station_location_names.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'short_description' => 'required',
            'priority'=> 'required', 
        ]);

        $record = FillingStationLocationNames::findOrFail($id);

        $record->update($data);

        return redirect()->route('filling_station_location_names.index', ['filling_station_id' => $record->filling_station_id])
            ->with('primary', 'Updated Successfully');
    }

    public function destroy($id)
    {
        $record = FillingStationLocationNames::findOrFail($id);

        $record->delete();

        return redirect()->back()->with('danger', 'Content Deleted Successfully');
    }
}
