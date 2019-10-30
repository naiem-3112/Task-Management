<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.list', compact('users'));
        /* $role=Auth::user();
         $permisssion=$role->whereHas('permissions',function ($permit){
             $permit ->where('name', 'add_student');
         })->get();
         dd($permisssion->first()->name);*/
    }

    public function createForm()
    {
        $roles = Role::all();
        return view('user.create', compact('roles'));
    }

    public function create(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:3',
            'from' => 'required',
            'to' => 'required',

        ]);
        $request['password'] = bcrypt($request->password);
        $user = Student::create($request->all());
        $user->save();
        $user->roles()->attach($request->role);
        return redirect('user/list');
    }

    public function edit($id)
    {
        $editDetails = Student::find($id);
        return view('user.edit', compact('editDetails'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'from' => 'required',
            'to' => 'required',
        ]);
        $updateDetails = Student::find($id);
        $updateDetails->name = $request->name;
        $updateDetails->email = $request->email;
        $updateDetails->from = $request->from;
        $updateDetails->to = $request->to;
        $updateDetails->save();
        return redirect('user/list');
    }

    public function delete($id)
    {
        $user = Student::find($id);
        $user->roles()->detach();
        $user->delete();
        return redirect('user/list');
    }
}
