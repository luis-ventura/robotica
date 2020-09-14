<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
class BitacorasR extends Model
{
    protected $table = 'bitacora_residencia';

    protected $fillable =[
        'date','user_id','updated_at'
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

    public function scopeCreated_at($query, $created_at)
    {
        if($created_at)
        {
            return $query->Orwhere('created_at','like', "%$created_at%");
        }
    }

    public function scopeUpdated_at($query, $updated_at)
    {
        if($updated_at)
        {
            return $query->Orwhere('updated_at','like', "%$updated_at%");
        }
    }

    /*public function scopeDate($query, $date)
    {
        if($date)
        {
            return $query->where('date','like', "%$date%");
        }
    }*/
}
