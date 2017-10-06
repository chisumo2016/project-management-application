<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    // Mass Assigment
    protected  $fillable = [
        'body',
        'url',
        'commentable_id',
        'commentable_type',
        'user_id',

    ];

    public  function  project()
    {
        return $this->belongsTo('App\Models\Project');
    }

}
