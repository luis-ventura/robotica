<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $table = 'visits';

    protected $fillable = ['date','assessor','user_id'];

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
