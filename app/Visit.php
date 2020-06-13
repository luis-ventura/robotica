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
}
