<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BitacorasSe extends Model
{
    protected $table    = 'bitacora_servicio_social';
    protected $fillable = ['date','adviser','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
