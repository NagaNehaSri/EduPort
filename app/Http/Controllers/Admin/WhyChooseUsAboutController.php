<?php

namespace App\Http\Controllers\Admin;

use App\Models\WhyChooseUsAbout;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WhyChooseUsAboutController extends Controller
{
    public function index()
    {
        $data = WhyChooseUsAbout::all();
        return view('admin.why_choose_us_about.index', compact("data"));
    }

    public function create()
    {
        return view('admin.why_choose_us_about.create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'short_description' => 'required',
            'icon_name'=> 'required',
            // 'image' => 'required|mimes:jpg,jpeg,png,svg,webp',
        ]);

        // if ($request->hasFile('image')) {
        //     $image = 'record' . rand() . '.' . $request->image->extension();
        //     $data['image'] = $image;
        //     $request->image->move(public_path('uploads/why_choose_us/'), $image);
        // }

        WhyChooseUsAbout::create($data);

        return redirect()->route('why_choose_us_about.index')->with('success', 'New Content Added');
    }

    public function edit($id)
    {
        $data = WhyChooseUsAbout::where('id', $id)->first();
        return view('admin.why_choose_us_about.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'short_description' => 'required',
            'icon_name'=> 'required',
            // 'image' => 'nullable|mimes:jpg,jpeg,png,svg,webp',
        ]);

        $record = WhyChooseUsAbout::find($id);

        // if ($request->hasFile('image')) {
        //     if ($record->image) {
        //         $oldThumbnailPath = public_path('uploads/why_choose_us/' . $record->image);
        //         if (file_exists($oldThumbnailPath)) {
        //             unlink($oldThumbnailPath);
        //         }
        //     }

        //     $image = $request->file('image');
        //     $thumbnail_name = time() . 'das.' . $image->getClientOriginalExtension();
        //     $thumbnail_path = public_path('/uploads/why_choose_us/');
        //     $image->move($thumbnail_path, $thumbnail_name);
        //     $data['image'] = $thumbnail_name;
        // }

        $record->update($data);

        return redirect()->route('why_choose_us_about.index')->with('primary', 'Updated Successfully');
    }

    public function destroy($id)
    {
        $record = WhyChooseUsAbout::findOrFail($id);
        $record->delete();
        return redirect()->back()->with('danger', 'Content Deleted Successfully');
    }
}
