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

    public function wasCreatedBy($user)
    {
        if(is_null($user))
        {
            return false;
        }
        return $this->user_id === $user->id;
    }
}
