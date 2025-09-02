<?php

namespace App\Http\Controllers\Admin;

use App\Models\ChapterContent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChapterContentController extends Controller
{
  public function index(Request $request)
  {
    $chapter_id = $request->chapter_id;
    $data = ChapterContent::where('chapter_id', $chapter_id)->get();
    return view('admin.chapter_content.index', compact('data', 'chapter_id'));
  }
  public function create(Request $request)
  {
    $chapter_id = $request->chapter_id;

    return view('admin.chapter_content.create', compact("chapter_id"));
  }
  
//   new code 
public function store(Request $request)
{
    $data = $this->validate($request, [
        'chapter_id' => 'nullable',
        'title' => 'nullable|string|max:255',
        'priority' => 'nullable|integer',
        'description' => 'nullable|string',
    ]);

    // Apply default values if fields are empty
    $data['title'] = $data['title'] ?: 'Untitled Feature';
    $data['priority'] = $data['priority'] ?? 0;
    $data['description'] = $data['description'] ?: 'No description provided';

    ChapterContent::create($data);

    return redirect()
        ->route('chapter_content.index', ['chapter_id' => $request->chapter_id])
        ->with('success', 'New Service Feature Added');
}

//   old code 

//   public function store(Request $request)
//   {
//     // dd($request);
//     $data = $this->validate($request, [
//       'chapter_id' => 'nullable',
//       'title' => 'nullable',
//       'priority' => 'nullable|integer',
    

//       'description' => 'nullable',

//     ]);


//     ChapterContent::create($data);
//     return redirect()->route('chapter_content.index', ['chapter_id' => $request->chapter_id])->with('success', 'New Service Feature Added');
//   }

  public function edit($id)
  {
    $data = ChapterContent::where('id', $id)->first();
    return view('admin.chapter_content.edit', compact('data'));
  }

//   public function update(Request $request, $id)
//   {
//     $data = $this->validate($request, [
//     //   'chapter_id' => 'required',
//       'title' => 'nullable',
//       'priority' => 'nullable|integer',
     

//       'description' => 'nullable',

//     ]);
    
//     $image = ChapterContent::find($id);


//     $image->update($data);

//     return redirect()->route('chapter_content.index',['chapter_id' => $image->chapter_id])->with('primary', 'Service Feature Updated Successfully');
//   }

// old data 
public function update(Request $request, $id)
{
    $data = $this->validate($request, [
        'title' => 'nullable|string|max:255',
        'priority' => 'nullable|integer',
        'description' => 'nullable|string',
    ]);

    // Apply default values
    $data['title'] = $data['title'] ?: 'Untitled Feature';
    $data['priority'] = $data['priority'] ?? 0;
    $data['description'] = $data['description'] ?: 'No description provided';

    $chapterContent = ChapterContent::findOrFail($id);

    $chapterContent->update($data);

    return redirect()
        ->route('chapter_content.index', ['chapter_id' => $chapterContent->chapter_id])
        ->with('primary', 'Service Feature Updated Successfully');
}

  function destroy($id)
  {
    $image = ChapterContent::findOrFail($id);
    // Delete the old video file if it exists

    $image->delete();
    return redirect()->back()->with('danger', 'Service Feature Deleted Successfully');
  }
}
