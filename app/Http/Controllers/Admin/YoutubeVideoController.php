<?php

namespace App\Http\Controllers\Admin;

use App\Models\YoutubeVideo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class YoutubeVideoController extends Controller
{
  public function index()
  {
    $data = YoutubeVideo::all();
    return view('admin.youtube_video.index', compact("data"));
  }
  //
  public function create()
  {
    return view('admin.youtube_video.create');
  }

  public function store(Request $request)
  {
    $data = $this->validate($request, [
      'youtube_link' => 'required',
    ]);

    

    YoutubeVideo::create($data);

    return redirect()->route('youtube_video.index')->with('success', 'New Video Added');
  }

  public function edit($id)
  {
    $data = YoutubeVideo::where('id', $id)->first();
    return view('admin.youtube_video.edit', compact('data'));
  }

  public function update(Request $request, $id)
  {
    $data = $this->validate($request, [
      'youtube_link' => 'required',
    ]);
    $image = YoutubeVideo::find($id);

    $image->update($data);

    return redirect()->route('youtube_video.index')->with('primary', 'Video Updated Successfully');
  }
  function destroy($id)
  {
    $image = YoutubeVideo::findOrFail($id);
   
    $image->delete();
    return redirect()->back()->with('danger', 'Video Deleted Successfully');
  }
}
