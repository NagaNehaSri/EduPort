<?php

namespace App\Http\Controllers\Admin;

use App\Models\Work;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkController extends Controller
{
  public function index()
  {
    $data = Work::all();
    return view('admin.work.index', compact("data"));
  }
  //
  public function create()
  {
    return view('admin.work.create');
  }

  public function store(Request $request)
  {
    $data = $this->validate($request, [
      'title' => 'required',
      'description' => 'required',
    ]);

    Work::create($data);

    return redirect()->route('work.index')->with('success', 'New Work Added');
  }

  public function edit($id)
  {
    $data = Work::where('id', $id)->first();
    return view('admin.work.edit', compact('data'));
  }

  public function update(Request $request, $id)
  {
    $data = $this->validate($request, [
      'title' => 'required',
      'description' => 'required',
    ]);
    $work = Work::find($id);

    $work->update($data);

    return redirect()->route('work.index')->with('primary', 'Work Updated Successfully');
  }
  function destroy($id)
  {
    $work = Work::findOrFail($id);
    $work->delete();
    return redirect()->back()->with('danger', 'Work Deleted Successfully');
  }
}
