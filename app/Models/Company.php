<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    // Mass Assigment
    protected $fillable = [
        'name',
        'description',
        'user_id',

    ];

    public  function  user()
    {
        return $this->belongsTo('App\Models\User');
    }


    public function  projects()
    {
        return $this->hasMany('App\Models\Project');
    }

}