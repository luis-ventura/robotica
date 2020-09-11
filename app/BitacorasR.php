<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BitacorasR extends Model
{
    protected $table = 'bitacora_residencia';

    protected $fillable =[
        'date','user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function wasCreatedBy($user)
    {
        if(is_null($user))
        {
            return false;
        }
        return $this->user_id === $user->id;
    }
}
