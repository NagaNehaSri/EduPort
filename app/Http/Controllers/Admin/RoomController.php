<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Flat;
use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class RoomController extends Controller
{
  // //
  // public function index()
  // {
  //     $data = Flat::orderby('created_at', 'DESC')->get();
  //     return view('admin.room.index', compact('data'));
  // }


  public function edit($id)
  {
    $data = Flat::where('id', $id)->first();
    $rooms = Room::where('flat_id', $id)->get();
    return view('admin.rooms.edit', compact('data', 'rooms'));
  }

  public function edit_room($flat_id, $room_id)
  {
    $data = Flat::findOrFail($flat_id);
    $room = Room::findOrFail($room_id);
    $rooms = Room::where('flat_id', $data->id)->get();

    // Optionally, you can check if the room belongs to the flat
    if ($room->flat_id !== $data->id) {
      abort(404); // or handle differently, e.g., redirect
    }

    return view('admin.rooms.edit', compact('data', 'rooms', 'room'));
  }
  public function store(Request $request)
  {
    $data = $this->validate($request, [
      'flat_id' => 'required',
      'room_number' => 'required',
      'view' => 'required',
      'BHK' => 'required|numeric',
      'sqft' => 'required|numeric',
      'status' => 'required',
    ]);

    // Check if room_id is present in the request
    if ($request->has('room_id') && !empty($request->room_id)) {
      // Update existing room details
      $room = Room::findOrFail($request->room_id);
      $room->update($data);
      $message = 'Room Updated';
    } else {
      // Create new room
      Room::create($data);
      $message = 'New Room Added';
    }

    return redirect()->back()->with('success', $message);
  }

  public function destroy($id)
  {
    // return("Coming in destory");
    $room = Room::findOrFail($id);
    $room->delete();
    // return response()->json(['success' => true]);
    return redirect()->back()->with('danger', 'Room Deleted');
  }
}
