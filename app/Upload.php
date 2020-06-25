<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    protected $table = 'upload_pdf';

    protected $fillable = [
        'upload'
        ,'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
