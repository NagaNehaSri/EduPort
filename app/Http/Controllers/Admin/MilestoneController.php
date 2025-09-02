<?php

namespace App\Http\Controllers\Admin;

use App\Models\Milestone;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MilestoneController extends Controller
{
  public function index()
  {
    $data = Milestone::all();
    return view('admin.milestone.index', compact("data"));
  }
  //
  public function create()
  {
    return view('admin.milestone.create');
  }

  public function store(Request $request)
  {
    // die("executing");
    $data = $this->validate($request, [
      'year' => 'required',
      'description' => 'required',
    ]);


    Milestone::create($data);

    return redirect()->route('milestone.index')->with('success', 'New Milestone Added');
  }

  public function edit($id)
  {
    $data = Milestone::where('id', $id)->first();
    return view('admin.milestone.edit', compact('data'));
  }

  public function update(Request $request, $id)
  {
    $data = $this->validate($request, [
      'year' => 'required',
      'description' => 'required',
    ]);
    $milestone = Milestone::find($id);
    $milestone->update($data);

    return redirect()->route('milestone.index')->with('primary', 'Milestone Updated Successfully');
  }
  function destroy($id)
  {
    $milestone = Milestone::findOrFail($id);
    $milestone->delete();
    return redirect()->back()->with('danger', 'Milestone Deleted Successfully');
  }
}
