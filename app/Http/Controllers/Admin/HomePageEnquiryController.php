<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePageEnquiry;
use Illuminate\Http\Request;

class HomePageEnquiryController extends Controller
{
    public function index()
    {
        $data = HomePageEnquiry::all();
        return view('admin.home_page_enquiry.index', compact("data"));
    }
    //
    public function create()
    {
        return view('admin.home_page_enquiry.create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
           
            'heading' => 'required',
            'short_description' => 'required',
            'video_text' => 'required',
            'video_link' => 'required',
        
        ]);

        

        HomePageEnquiry::create($data);

        return redirect()->route('home_page_enquiry.index')->with('success', 'New home page enquiry section Info Added');
    }

    public function edit($id)
    {
        $data = HomePageEnquiry::where('id', $id)->first();
        return view('admin.home_page_enquiry.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
          
           'heading' => 'required',
            'short_description' => 'required',
            'video_text' => 'required',
            'video_link' => 'required',
            

        ]);

        $banner = HomePageEnquiry::find($id);

       
        $banner->update($data);
        return redirect()->back()->with('primary', 'Updated Successfully');
        // return redirect()->back()->with('success', 'home page enquiry section Info Successfully');

    }
    function destroy($id)
    {
        $banner = HomePageEnquiry::findOrFail($id);
        // Delete the old video file if it exists
        
        $banner->delete();
        return redirect()->back()->with('danger', 'home page enquiry section Info Deleted Successfully');
    }
}
