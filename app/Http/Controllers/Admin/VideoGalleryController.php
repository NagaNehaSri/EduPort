<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VideoGallery;
use Illuminate\Http\Request;

class VideoGalleryController extends Controller
{
    public function index()
    {
        $data = VideoGallery::all();
        return view('admin.video_gallery.index', compact('data'));
    }
    
    public function create()
    {
        return view('admin.video_gallery.create');
    }
    
    public function store(Request $request)
    {
        $data = $request->validate([
            'video' => 'required|mimes:mp4,mkv,avi,webm',
        ]);
    
        if ($request->hasFile('video')) {
            $videoName = 'video_' . rand() . '.' . $request->video->extension();
            $data['video'] = $videoName;
            $request->video->move(public_path('uploads/video_gallery/'), $videoName);
        }
    
        VideoGallery::create($data);
        return redirect()->route('video_gallery.index')->with('success', 'New Gallery Video Added');
    }
    
    public function edit($id)
    {
        $data = VideoGallery::findOrFail($id);
        return view('admin.video_gallery.edit', compact('data'));
    }
    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'video' => 'nullable|mimes:mp4,mkv,avi,webm|max:20480', 
        ]);
    
        $videoGallery = VideoGallery::findOrFail($id);
    
        if ($request->hasFile('video')) {
            if ($videoGallery->video) {
                $oldVideoPath = public_path('uploads/video_gallery/' . $videoGallery->video);
                if (file_exists($oldVideoPath)) {
                    unlink($oldVideoPath);
                }
            }
    
            $videoName = 'video_' . rand() . '.' . $request->video->extension();
            $request->video->move(public_path('uploads/video_gallery/'), $videoName);
            $validatedData['video'] = $videoName;
        }
    
        $videoGallery->update($validatedData);
    
        return redirect()->route('video_gallery.index')->with('success', 'Gallery Video Updated Successfully');
    }
    
    public function destroy($id)
    {
        $videoGallery = VideoGallery::findOrFail($id);
    
        if ($videoGallery->video) {
            $oldFilePath = public_path('uploads/video_gallery/' . $videoGallery->video);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
    
        $videoGallery->delete();
    
        return redirect()->back()->with('danger', 'Gallery Video Deleted Successfully');
    }
    
}
