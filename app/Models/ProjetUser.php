<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjetUser extends Model
{
    //
    // Mass Assigment
    protected  $fillable = [

        'project_id',
        'user_id',

    ];

}
