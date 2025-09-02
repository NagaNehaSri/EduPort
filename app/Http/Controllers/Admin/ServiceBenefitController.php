<?php

namespace App\Http\Controllers\Admin;

use App\Models\ServiceBenefit;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceBenefitController extends Controller
{
  public function index(Request $request)
  {
    $service_id = $request->service_id;
    $data = ServiceBenefit::where('service_id', $service_id)->get();
    return view('admin.service_benefits.index', compact('data', 'service_id'));
  }
  public function create(Request $request)
  {
    $service_id = $request->service_id;
    return view('admin.service_benefits.create', compact("service_id"));
  }

  public function store(Request $request)
  {
    // dd($request);
    $data = $this->validate($request, [
      'service_id' => 'required',
      'heading' => 'required',

    ]);

    ServiceBenefit::create($data);
    return redirect()->route('service_benefits.index', ['service_id' => $request->service_id])->with('success', 'New Service Benefits Added');
  }

  public function edit($id)
  {
    $data = ServiceBenefit::where('id', $id)->first();
    return view('admin.service_benefits.edit', compact('data'));
  }

  public function update(Request $request, $id)
  {
    $data = $this->validate($request, [
      'heading' => 'required',
     
    ]);
    $data['priority'] = $request->priority;
    $image = ServiceBenefit::find($id);


    $image->update($data);

    return redirect()->route('service_benefits.index',['service_id' => $image->service_id])->with('primary', 'Service Benefits Updated Successfully');
  }
  function destroy($id)
  {
    $image = ServiceBenefit::findOrFail($id);
    // Delete the old video file if it exists
 
    $image->delete();
    return redirect()->back()->with('danger', 'Service Benefits Deleted Successfully');
  }
}
