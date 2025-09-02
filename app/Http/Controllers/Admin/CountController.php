<?php
namespace App\Http\Controllers\Admin;

use App\Models\Count;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountController extends Controller
{
    public function index()
    {
        $data = Count::all();
        return view('admin.count.index', compact('data'));
    }

    public function create()
    {
        return view('admin.count.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'value' => 'required',
            'icon_name' => 'required',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // if ($request->hasFile('image')) {
        //     $imageName = 'image_' . rand() . '.' . $request->image->extension();
        //     $data['image'] = $imageName;
        //     $request->image->move(public_path('uploads/count/'), $imageName);
        // }

        Count::create($data);

        return redirect()->route('count.index')->with('success', 'New Count Added');
    }

    public function edit($id)
    {
        $data = Count::findOrFail($id);
        return view('admin.count.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'value' => 'required',
            'icon_name' => 'required',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $count = Count::findOrFail($id);

        // if ($request->hasFile('image')) {
     
        //     if ($count->image) {
        //         $oldImagePath = public_path('uploads/count/' . $count->image);
        //         if (file_exists($oldImagePath)) {
        //             unlink($oldImagePath);
        //         }
        //     }

           
        //     $imageName = 'image_' . rand() . '.' . $request->image->extension();
        //     $request->image->move(public_path('uploads/count/'), $imageName);
        //     $data['image'] = $imageName;
        // }

        $count->update($data);

        return redirect()->route('count.index')->with('primary', 'Count Updated Successfully');
    }

    public function destroy($id)
    {
        $count = Count::findOrFail($id);
        if ($count->image) {
            $oldFilePath = public_path('uploads/count/' . $count->image);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
        $count->delete();
        return redirect()->back()->with('danger', 'Count Deleted Successfully');
    }
}
