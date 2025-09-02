<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TestExam;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TestExamsController extends Controller
{
    public function index()
    {
        $data = TestExam::all();
        return view('admin.test_exams.index', compact("data"));
    }

    public function create()
    {
        return view('admin.test_exams.create');
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
            $image = 'test_exams_img1' . rand() . '.' . $request->image->extension();
            $data['image'] = $image;
            $request->image->move(public_path('uploads/test_exams'), $image);
        }
        if ($request->hasFile('image_2')) {
            $image_2 = 'test_exams_img2' . rand() . '.' . $request->image_2->extension();
            $data['image_2'] = $image_2;
            $request->image_2->move(public_path('uploads/test_exams'), $image_2);
        }

        $data['heading'] = strip_tags($request->heading);
        $data['slug'] = Str::slug($data['heading'], '-');

        TestExam::create($data);

        return redirect()->route('test_exams.index')->with('success', 'New Student Service Added');
    }


    public function edit($id)
    {
        $data = TestExam::findOrFail($id);
        return view('admin.test_exams.edit', compact('data'));
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
    
        $studentService = TestExam::findOrFail($id);
    
        if ($request->hasFile('image')) {
            if ($studentService->image) {
                $oldFilePath = public_path('uploads/test_exams/' . $studentService->image);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
            $image = 'test_exams_img1' . time() . '.' . $request->image->extension();
            $data['image'] = $image;
            $request->image->move(public_path('uploads/test_exams'), $image);
        }
    
        if ($request->hasFile('image_2')) {
            if ($studentService->image_2) {
                $oldFilePath = public_path('uploads/test_exams/' . $studentService->image_2);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
            $image_2 = 'test_exams_img2_' . time() . '.' . $request->image_2->extension();
            $data['image_2'] = $image_2;
            $request->image_2->move(public_path('uploads/test_exams'), $image_2);
        }
        
        $data['heading'] = strip_tags($request->heading);
        $data['slug'] = Str::slug($data['heading'], '-');

        $studentService->update($data);
    
        return redirect()->route('test_exams.index')->with('success', 'Student Service Updated Successfully');
    }
    

    public function destroy($id)
    {
        $about =  TestExam::findOrFail($id);

       
        if ($about->image) {
            $oldFilePath = public_path('uploads/test_exams/' . $about->image);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
        if ($about->image_2) {
            $oldFilePath = public_path('uploads/test_exams/' . $about->image_2);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
    

        $about->delete();
        return redirect()->back()->with('danger', 'Deleted Successfully');
    }
}
