<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cms;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class CmsController extends Controller
{
   
    public function index()
    {
        $data = Cms::all();
        return view('admin.cms.index', compact('data'));
    }

    public function create()
    {
        return view('admin.cms.create');
    }


    public function store(Request $request)
    {
        // Validate the request
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'heading' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);


        Cms::create($data);

        return redirect()->route('cms.index')->with('success', 'CMS Entry Created Successfully');
    }
    public function edit($id)
    {
        $data = Cms::findOrFail($id);
        return view('admin.cms.edit', compact('data'));
    }

 
    public function update(Request $request, $id)
    {
      
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'heading' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

     
        $cms = Cms::findOrFail($id);
        $cms->update($data);

        return redirect()->route('cms.index')->with('success', 'CMS Entry Updated Successfully');
    }


    public function destroy($id)
    {
        $cms = Cms::findOrFail($id);
        $cms->delete();

        return redirect()->route('cms.index')->with('success', 'CMS Entry Deleted Successfully');
    }
}
