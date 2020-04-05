<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guard_name = 'web';

    protected $fillable = [
        'name','guard_name',
    ];
    
    /*public function users()
    {
        return $this->hasMany('App\User','id');
    }*/
}