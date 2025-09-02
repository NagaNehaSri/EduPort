<?php

namespace App\Http\Controllers\Admin;

use App\Models\StudentService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StudentServiceController extends Controller
{
    public function index()
    {
        $data = StudentService::all();
        return view('admin.student_services.index', compact("data"));
    }

    public function create()
    {
        return view('admin.student_services.create');
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
            $image = 'student_services_' . rand() . '.' . $request->image->extension();
            $data['image'] = $image;
            $request->image->move(public_path('uploads/student_services'), $image);
        }
        if ($request->hasFile('image_2')) {
            $image_2 = 'student_services_2' . rand() . '.' . $request->image_2->extension();
            $data['image_2'] = $image_2;
            $request->image_2->move(public_path('uploads/student_services'), $image_2);
        }

        // $data['slug'] = Str::slug($request->heading, '-');
        $data['slug'] = Str::slug(strip_tags($request->heading));

        // $data['heading'] = strip_tags($request->heading);
        // $data['slug'] = Str::slug($data['heading'], '-');


        StudentService::create($data);

        return redirect()->route('student_services.index')->with('success', 'New Student Service Added');
    }


    public function edit($id)
    {
        $data = StudentService::findOrFail($id);
        return view('admin.student_services.edit', compact('data'));
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
    
        $studentService = StudentService::findOrFail($id);
    
        if ($request->hasFile('image')) {
            if ($studentService->image) {
                $oldFilePath = public_path('uploads/student_services/' . $studentService->image);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
            $image = 'student_services_' . time() . '.' . $request->image->extension();
            $data['image'] = $image;
            $request->image->move(public_path('uploads/student_services'), $image);
        }
    
        if ($request->hasFile('image_2')) {
            if ($studentService->image_2) {
                $oldFilePath = public_path('uploads/student_services/' . $studentService->image_2);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
            $image_2 = 'student_services_2_' . time() . '.' . $request->image_2->extension();
            $data['image_2'] = $image_2;
            $request->image_2->move(public_path('uploads/student_services'), $image_2);
        }

        $data['slug'] = Str::slug(strip_tags($request->heading));

        // $data['heading'] = strip_tags($request->heading);
        // $data['slug'] = Str::slug($data['heading'], '-');

        $studentService->update($data);
    
        return redirect()->route('student_services.index')->with('success', 'Student Service Updated Successfully');
    }
    

    public function destroy($id)
    {
        $about =  StudentService::findOrFail($id);

        // Delete the old images if they exist
        if ($about->image) {
            $oldFilePath = public_path('uploads/student_services/' . $about->image);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
        if ($about->image_2) {
            $oldFilePath = public_path('uploads/student_services/' . $about->image_2);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
        // if ($about->mission_image) {
        //     $oldFilePath = public_path('uploads/about/' . $about->experienceiconimage);
        //     if (file_exists($oldFilePath)) {
        //         unlink($oldFilePath);
        //     }
        // }
        // if ($about->vision_icon_image) {
        //     $oldFilePath = public_path('uploads/about/' . $about->vision_icon_image);
        //     if (file_exists($oldFilePath)) {
        //         unlink($oldFilePath);
        //     }
        // }
        // if ($about->mission_icon_image) {
        //     $oldFilePath = public_path('uploads/about/' . $about->mission_icon_image);
        //     if (file_exists($oldFilePath)) {
        //         unlink($oldFilePath);
        //     }
        // }

        $about->delete();
        return redirect()->back()->with('danger', 'Deleted Successfully');
    }
}
