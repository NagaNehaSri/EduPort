<?php

namespace App\Http\Controllers\Admin;

use App\Models\Job;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobController extends Controller
{
  public function index()
  {
    $data = Job::all();
    return view('admin.job.index', compact("data"));
  }
  //
  public function create()
  {
    return view('admin.job.create');
  }

  public function store(Request $request)
  {
    // die("executing");
    $data = $this->validate($request, [
      'role' => 'required',
      'description' => 'required',
      'status' => 'required',
    ]);


    Job::create($data);

    return redirect()->route('job.index')->with('success', 'New Job Added');
  }

  public function edit($id)
  {
    $data = Job::where('id', $id)->first();
    return view('admin.job.edit', compact('data'));
  }

  public function update(Request $request, $id)
  {
    $data = $this->validate($request, [
      'role' => 'required',
      'description' => 'required',
      'status' => 'required',
    ]);
    $job = Job::find($id);
    $job->update($data);

    return redirect()->route('job.index')->with('primary', 'Job Updated Successfully');
  }
  function destroy($id)
  {
    $job = Job::findOrFail($id);
    $job->delete();
    return redirect()->back()->with('danger', 'Job Deleted Successfully');
  }
}
