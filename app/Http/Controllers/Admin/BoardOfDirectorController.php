<?php

namespace App\Http\Controllers\Admin;

use App\Models\BoardOfDirector;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BoardOfDirectorController extends Controller
{
  public function index()
  {
    $data = BoardOfDirector::all();
    return view('admin.board_of_director.index', compact("data"));
  }
  //
  public function create()
  {
    return view('admin.board_of_director.create');
  }

  public function store(Request $request)
  {
    $data = $this->validate($request, [
      'name' => 'required',
      'designation' => 'required',
      'image' => 'required',
    ]);

if ($request->hasFile('image')) {
      $image = 'image' . rand() . '.' . $request->image->extension();
      $data['image'] = $image;
      //dd($data['image']);
      $request->image->move(public_path('uploads/board_of_directors/'), $image);
    } 
    $data['description'] = $request->description;

    BoardOfDirector::create($data);

    return redirect()->route('board_of_director.index')->with('success', 'New Board of Director Added');
  }

  public function edit($id)
  {
    $data = BoardOfDirector::where('id', $id)->first();
    return view('admin.board_of_director.edit', compact('data'));
  }

  public function update(Request $request, $id)
  {
    $data = $this->validate($request, [
      'name' => 'required',
      'designation' => 'required',
    ]);
    $data['description'] = $request->description;
    if ($request->hasFile('image')) {


      // Upload the new video file
      $image = 'image' . rand() . '.' . $request->image->extension();
      $request->image->move(public_path('uploads/board_of_directors/'), $image);

      $data['image'] = $image;
    }
    $record = BoardOfDirector::find($id);

    $record->update($data);

    return redirect()->route('board_of_director.index')->with('primary', 'Board of Director Updated Successfully');
  }
  function destroy($id)
  {
    $record = BoardOfDirector::findOrFail($id);
    // Delete the old video file if it exists
    if ($record->image) {
      $oldFilePath = public_path('uploads/board_of_directors/' . $record->image);
      if (file_exists($oldFilePath)) {
        unlink($oldFilePath);
      }
    }
    $record->delete();
    return redirect()->back()->with('danger', 'Board of Director Deleted Successfully');
  }
}
