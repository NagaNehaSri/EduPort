<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActiveAdController extends Controller
{
    public function edit($id)
    {
        $data = Setting::find($id);
        return view('admin.settings.sm_settings.active-ad', compact('data'));
    }
    public function update(Request $request, $id)
    {
        if($request->pages){
            $data['pages']=implode(',',$request->pages);
        }
        else{
            $data['pages']="";
        }
        $record = Setting::find($id);
        $record->update($data);
        return redirect()->back()->with('primary', 'Active ad on pages Successfully :)');
    }
}
