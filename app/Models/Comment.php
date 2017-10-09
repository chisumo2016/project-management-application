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

//    public  function  project()
//    {
//        return $this->belongsTo('App\Models\Project');
//    }

//    public function user()
//    {
//        return $this->hasOne('\App\User', 'id', 'user_id');
//    }
//
    public function  commentable()
    {
        return $this->morphTo();
    }

    /**
     * Return the user associated with this comment
     *
     * @return array
     */

    public function user()
    {
        return $this->hasOne('\App\Models\User', 'id', 'user_id');
    }



}
