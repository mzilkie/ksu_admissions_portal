<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
    //
    protected $guarded = [
        'id', 
        'user_id', 
        'created_at', 
        'published_at'
    ];
}
