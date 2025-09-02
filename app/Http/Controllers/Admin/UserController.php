<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        




  

        return view('admin.user.index', compact('data'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*?&#]/'
            ],
            'role_id' => 'required|exists:roles,id',
        ]);





        $roleid = $data['role_id'];
        $privileges = Role::where('id', $roleid)->pluck('privileges')->first();








        // $data['role_id'] = $roleid;
        $data['privileges'] = $privileges;

        $data['password'] = Hash::make($data['password']);
        // dd( $data);


        User::create($data);

        return redirect()->route('user.index')->with('success', 'New User Added');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,

            'role_id' => 'required|exists:roles,id',
        ]);




        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user = User::findOrFail($id);
        $user->update($data);

        return redirect()->route('user.index')->with('primary', 'User Updated Successfully');
    }


    public function destroy($id)
    {
        // return("Coming in destory");
        $user = User::findOrFail($id);
        $user->delete();
        // return response()->json(['success' => true]);
        return redirect()->back()->with('danger', 'Role Deleted Successfull');
    }
}
