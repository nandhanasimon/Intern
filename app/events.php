<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class events extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_name', 'venue', 'date', 'start_time', 'photo', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       'remember_token',
    ];
}
