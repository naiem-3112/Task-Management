<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Permission;

class PermissionController extends Controller
{


    public function index()
    {
        $permissions = Permission::all();
        return view('permission.listPermission', compact('permissions'));
    }

    public function permissionCreateForm()
    {
        return view('permission.createPermission');
    }

    public function permissionCreate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',

        ]);
        $permissionCreate = Permission::create($request->all());
        $permissionCreate->save();
        return redirect('permission/list');
    }

    public function permissionEdit($id)
    {
        $editPermissions = Permission::find($id);
        return view('permission.editPermission', compact('editPermissions'));
    }

    public function permissionUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $roleUpdate = Permission::find($id);
        $roleUpdate->name = $request->name;
        $roleUpdate->save();
        return redirect('permission/list');
    }

    public function permissionDelete($id)
    {
        Permission::find($id)->delete();
        return redirect('permission/list');
    }
}
