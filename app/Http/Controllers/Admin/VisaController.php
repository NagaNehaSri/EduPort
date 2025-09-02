<?php

namespace App\Http\Controllers\Admin;

use App\Models\Visa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VisaController extends Controller
{
    public function index()
    {
        $data = Visa::all();
        return view('admin.visa.index', compact("data"));
    }

    public function create()
    {
        return view('admin.visa.create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [

            'heading' => 'required|string',
            'description' => 'required|string',
            'description_2' => 'required|string',
            'description_3' => 'required|string',
            'image' => 'required|mimes:jpg,jpeg,png,svg,webp',
            'image_2' => 'required|mimes:jpg,jpeg,png,svg,webp',
        ]);

        if ($request->hasFile('image')) {
            $image = 'visa_img1' . rand() . '.' . $request->image->extension();
            $data['image'] = $image;
            $request->image->move(public_path('uploads/visa'), $image);
        }
        if ($request->hasFile('image_2')) {
            $image_2 = 'visa_img2' . rand() . '.' . $request->image_2->extension();
            $data['image_2'] = $image_2;
            $request->image_2->move(public_path('uploads/visa'), $image_2);
        }

        $data['slug'] = Str::slug(strip_tags($request->heading));

        Visa::create($data);

        return redirect()->route('visa.index')->with('success', 'New Student Service Added');
    }


    public function edit($id)
    {
        $data = Visa::findOrFail($id);
        return view('admin.visa.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'heading' => 'required|string',
            'description' => 'required|string',

            'description_2' => 'required|string',
            'description_3' => 'required|string',
            'image' => 'nullable|mimes:jpg,jpeg,png,svg,webp',
            'image_2' => 'nullable|mimes:jpg,jpeg,png,svg,webp',
        ]);

        $studentService = Visa::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($studentService->image) {
                $oldFilePath = public_path('uploads/visa/' . $studentService->image);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
            $image = 'visa_img1' . time() . '.' . $request->image->extension();
            $data['image'] = $image;
            $request->image->move(public_path('uploads/visa'), $image);
        }

        if ($request->hasFile('image_2')) {
            if ($studentService->image_2) {
                $oldFilePath = public_path('uploads/visa/' . $studentService->image_2);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
            $image_2 = 'visa_img2_' . time() . '.' . $request->image_2->extension();
            $data['image_2'] = $image_2;
            $request->image_2->move(public_path('uploads/visa'), $image_2);
        }

        $data['slug'] = Str::slug(strip_tags($request->heading));

        $studentService->update($data);

        return redirect()->route('visa.index')->with('success', 'Student Service Updated Successfully');
    }


    public function destroy($id)
    {
        $about =  Visa::findOrFail($id);

        // Delete the old images if they exist
        if ($about->image) {
            $oldFilePath = public_path('uploads/visa/' . $about->image);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
        if ($about->image_2) {
            $oldFilePath = public_path('uploads/visa/' . $about->image_2);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }


        $about->delete();
        return redirect()->back()->with('danger', 'Deleted Successfully');
    }
}
