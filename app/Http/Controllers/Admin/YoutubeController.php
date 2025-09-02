<?php

namespace App\Http\Controllers\Admin;

use App\Models\Youtube;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class YoutubeController extends Controller
{
    //
    public function index()
    {
        $data = Youtube::orderby('created_at', 'DESC')->get();
        return view('admin.youtube.index', compact('data'));
    }

    public function create()
    {
        return view('admin.youtube.create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'youtube_link' => 'required'
        ]);


        Youtube::create($data);

        return redirect()->route('youtube.index')->with('success', 'New Youtube Link Added');
    }

    public function edit($id)
    {
        $data = Youtube::where('id', $id)->first();
        return view('admin.youtube.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'youtube_link' => 'required',
        ]);

        Youtube::find($id)->update($data);

        return redirect()->route('youtube.index')->with('success', 'Youtube Link Data Updated :)');
    }
    public function destroy($id) {
        $data = Youtube::findOrFail($id);

        $data->delete();

        return redirect()->route('youtube.index')->with('danger', 'Youtube Link Deleted');
    }
}
