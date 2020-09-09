<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $table = "news";

    protected $fillable = ['title','content','image_url','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
