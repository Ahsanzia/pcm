<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_project extends Model
{
    
    protected $fillable = [
        'user_id', 'project_id', 'access_id',
    ];

}
