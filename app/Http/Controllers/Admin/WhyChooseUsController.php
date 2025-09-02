<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;

class WhyChooseUsController extends Controller
{
    public function index()
    {
        $data = WhyChooseUs::all();
        return view('admin.why_choose_us.index', compact('data'));
    }

    public function create()
    {
        return view('admin.why_choose_us.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'description' => 'required',
        ]);

        WhyChooseUs::create($data);
        return redirect()->route('why_choose_us.index')->with('success', 'Created Successfully');
    }

    public function edit($id)
    {
        $data = WhyChooseUs::findOrFail($id);
        return view('admin.why_choose_us.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $whychooseus = WhyChooseUs::findOrFail($id);

        $data = $request->validate([
            'description' => 'required',
        ]);

        $whychooseus->update($data);
        return redirect()->back()->with('success', 'Updated Successfully');
    }

    public function destroy($id)
    {
        $whychooseus = WhyChooseUs::findOrFail($id);
        $whychooseus->delete();
        return redirect()->back()->with('danger', 'Deleted Successfully');
    }
}
