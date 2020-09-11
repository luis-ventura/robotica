<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table    = 'list_material';

    protected $fillable = [
        'date_material','material','observation', 'user_id'
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
