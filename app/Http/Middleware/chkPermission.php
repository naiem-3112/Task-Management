<?php

namespace App\Http\Middleware;

use App\Permission;
use Closure;
use Illuminate\Support\Facades\Auth;
use App\Role;

class chkPermission
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    /*$role=Auth::user();
$permisssion=$role->whereHas('permissions',function ($permit){
    $permit ->where('name', 'add_student');
})->get();
dd($permisssion->first()->name);*/
    public function handle($request, Closure $next)
    {
        $permissions = Permission::all();
        foreach ($permissions as $permission)
            $permissionlist[] = $permission->name;
        $users = Auth::user()->isAdmin(['admin', 'user']);
        $userpermissions=Permission::whereHas('roles',function ($role) use ($users){
            $role->where('name',$users);
        })->get();
        foreach ($userpermissions as $permit)
            $permits[]=$permit->name;
        $diff = array_diff($permissionlist, $permits);//ok
        if(empty($diff))
            return $next($request);
        else{
            $nopermissions=Permission::whereDoesntHave('roles',function ($role) use ($users){
                $role->where('name',$users);
            })->get();
            if(in_array($nopermissions->first()->name,$diff))
                return abort(401);
        }
    }

}

