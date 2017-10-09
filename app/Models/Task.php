<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    // Mass Assigment
    protected  $fillable = [
        'name',
        'project_id',
        'user_id',
        'days',
        'hours',
        'company_id',
    ];


    public  function  user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public  function  project()
    {
        return $this->belongsTo('App\Models\Project');
    }

    public  function  company()
    {
        return $this->belongsTo('App\Models\Company');
    }

   //    Many To Many

    public  function  users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    public  function  comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }



}
