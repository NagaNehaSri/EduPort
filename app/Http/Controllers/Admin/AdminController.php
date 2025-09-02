<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Contact;
use App\Models\Enquiry;
// use App\Enquiry;
use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\JobApplication;
use App\Models\Log;
use App\Models\Talent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Support\Facades\Session as FacadesSession; //COMMENT added this one to flush the session during logout

class AdminController extends Controller
{
    public function index()
    {
        // dd($_REQUEST);
        $contacts = Contact::count();
        $inquiries = Inquiry::count();
        $job_applications = JobApplication::count();
        return view('admin.dashboard.index',compact('contacts','inquiries',"job_applications"));
    }

    public function profile() {
        return view('admin.admin_profile');
    }
    public function logs() {
        $datas = Log::orderBy('id','desc')->get();
        return view('admin.logs',compact('datas'));
    }

    public function updateAdminProfile(Request $request)
    {
        $user = Auth::user();

        $requestData = $request->except(['_token', '_method', 'cpassword']);


        if (!empty($requestData['password'])) {
            if (Hash::check($request->old_password, auth()->user()->password)) {
                $requestData['password'] = Hash::make($request->password);
                User::find($user->id)->update($requestData);
                Auth::logout();
                return redirect()->route('login');
            } else {
                return redirect()->route('admin_profile')->with('danger', 'Profile Password Not Match');
                $requestData['password'] = $user->password;
            }
        } else {
            $requestData['password'] = $user->password;
        }

        $update = User::find($user->id);

        if (!empty($update)) {
            $update->update($requestData);

            return redirect()->route('admin_profile')->with('success', 'Profile Updated Successfully :)');
        } else {
            return redirect()->route('admin_profile')->with('danger', 'Profile Not Updated :(');
        }

    }


    public function logout()
    {
        Auth::logout();
        FacadesSession::flush();  //COMMENT This line I used to flush the session during logout 
        return redirect('login');
    }
}
