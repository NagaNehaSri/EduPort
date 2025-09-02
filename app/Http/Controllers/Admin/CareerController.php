<?php

namespace App\Http\Controllers\Admin;

use App\Models\Career;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CareerController extends Controller
{
  public function index()
  {
    $data = Career::all();
    return view('admin.career.index', compact("data"));
  }
  
  public function create()
  {
    return view('admin.career.create');
  }

  public function store(Request $request)
  {
    $data = $this->validate($request, [
      'description' => 'required',
      'apply_link'=> 'required'
      // 'address' => 'required',
      // 'description' => 'required',
    ]);

    Career::create($data);

    return redirect()->route('career.index')->with('success', 'New Career Added');
  }

  public function edit($id)
  {
    $data = Career::where('id', $id)->first();
    return view('admin.career.edit', compact('data'));
  }

  public function update(Request $request, $id)
  {
    $data = $this->validate($request, [
      'description' => 'required',
      'apply_link'=> 'required'
    ]);
    $career = Career::find($id);

    $career->update($data);

    return redirect()->route('career.index')->with('primary', 'Career Updated Successfully');
  }
  function destroy($id)
  {
    $career = Career::findOrFail($id);
    $career->delete();
    return redirect()->back()->with('danger', 'Career Deleted Successfully');
  }
}
