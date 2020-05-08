<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table    = 'list_material';

    protected $fillable = [
        'date_material','material','entry_time','departure_time','observation'
    ];
}
