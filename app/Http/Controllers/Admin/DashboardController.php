<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index()
  {
    $data = Contact::all();
    return view('admin.contact.index', compact("data"));
  }

  public function inquiryIndex()
  {
    $data = Inquiry::all();
    return view('admin.inquiry.index', compact("data"));
  }

  function destroy($id)
  {
    $contact = Contact::findOrFail($id);
    $contact->delete();
    return redirect()->back()->with('danger', 'Deleted Successfully');
  }
  function inquiryDestroy($id)
  {
    $inquiry = Inquiry::findOrFail($id);
    $inquiry->delete();
    return redirect()->back()->with('danger', 'Deleted Successfully');
  }
}
