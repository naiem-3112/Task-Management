<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable= [
      'name', 'permission'
    ];
    /*protected $casts=[
        'permission' => 'array',
    ];*/

    public function users(){
        return $this->belongsToMany('App\User');
    }
    public function permissions(){
        return $this->belongsToMany('App\Permission');
    }
    public function students(){
        return $this->belongsToMany('App\Student');
    }

}
