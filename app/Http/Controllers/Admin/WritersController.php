<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Writer;
use Illuminate\Http\Request;

class WritersController extends Controller
{
    public function index()
    {
        $writers = Writer::get();
        return view('admin.writers.index', compact('writers'));
    }

    public function create()
    {
        return view('admin.writers.create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'image' => 'required|mimes:jpg,jpeg,png',
            'name' => 'required',
            'designation' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $image = 'writer_image_' . rand() . '.' . $request->image->extension();
            $data['image'] = $image;
            $request->image->move(public_path('uploads'), $image);
        }

        Writer::create($data);

        return redirect()->route('writers.index')->with('success', 'New Writers Added');

    }

    public function edit($id)
    {
        $data = Writer::where('id', $id)->first();
        return view('admin.writers.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'image' => 'mimes:jpg,jpeg,png',
            'name' => 'required',
            'designation' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $image = 'writer_image_' . rand() . '.' . $request->image->extension();
            $data['image'] = $image;
            $request->image->move(public_path('uploads'), $image);
        }

        Writer::find($id)->update($data);

        return redirect()->route('writers.index')->with('success', 'Writers Data Updated');

    }
}
