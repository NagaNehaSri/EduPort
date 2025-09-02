<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
  public function index()
  {
    $data = Faq::all();
    return view('admin.faq.index', compact("data"));
  }
  //
  public function create()
  {
    return view('admin.faq.create');
  }

  public function store(Request $request)
  {
    $data = $this->validate($request, [
      'title' => 'required',
      'short_description' => 'required',
    ]);

    Faq::create($data);

    return redirect()->route('faq.index')->with('success', 'New Faq Added');
  }

  public function edit($id)
  {
    $data = Faq::where('id', $id)->first();
    return view('admin.faq.edit', compact('data'));
  }

  public function update(Request $request, $id)
  {
    $data = $this->validate($request, [
      'title' => 'required',
      'short_description' => 'required',
    ]);
    $faq = Faq::find($id);

    $faq->update($data);

    return redirect()->route('faq.index')->with('primary', 'Faq Updated Successfully');
  }
  function destroy($id)
  {
    $faq = Faq::findOrFail($id);
    $faq->delete();
    return redirect()->back()->with('danger', 'Faq Deleted Successfully');
  }
}
