<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scenario extends Model
{
    protected $fillable = [
        'name', 'user_id',
    ];

    
}
