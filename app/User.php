<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $guard_name = 'web';

    protected $fillable = [
        'name', 'lastname','email', 'control_number','career','activity','password','avatar'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->lastName}";
    }

    public function scopeBuscarpor($query, $tipo, $buscar)
    {
        if(($tipo) && ($buscar))
        {
            return $query->where($tipo,'like',"%$buscar%");
        }
    }

    public function uploads()
    {
        return $this->hasMany(Upload::class);
    }
}
