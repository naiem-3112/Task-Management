<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
      'name',
    ];
    public function roles(){
        return $this->belongsToMany('App\Role');
    }
    public function hasPermissions($permissions){

        $permission=$this->roles()->whereIn('name', $permissions )->get();
        if($permission) {
            foreach ($permission as $per) {
                $list[] = $per->name;
            }
            return $list;
        }
        return false;
    }
}
