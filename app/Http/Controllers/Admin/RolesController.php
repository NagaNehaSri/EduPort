<?php

namespace App\Http\Controllers\admin;

use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        $data = Role::all();
        return view('admin.roles.index', compact("data"));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'role_name' => 'required',
            'privileges' => 'required|array',
        ]);

        $data['privileges'] = implode(',', $request->privileges) . ',admin,logout';

        Role::create($data);

        return redirect()->route('roles.index')->with('success', 'New Role Added');
    }

    public function edit($id)
    {
        $data = Role::findOrFail($id);
        return view('admin.roles.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'role_name' => 'required|string',
            'privileges' => 'required|array',
        ]);

        $data['privileges'] = implode(',', $request->privileges) . ',admin,logout';

        $role = Role::findOrFail($id);
        $role->update($data);

        return redirect()->route('roles.index')->with('primary', 'Roles Updated Successfully');
    }


    public function destroy($id)
    {
      // return("Coming in destory");
      $role = Role::findOrFail($id);
      $role->delete();
      // return response()->json(['success' => true]);
      return redirect()->back()->with('danger', 'Role Deleted Successfull');
    }
}
