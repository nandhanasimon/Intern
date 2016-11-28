<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{

    public $table = "guest";
    protected $fillable = [
        'guest_name', 'phnumber', 'no_of_couples', 'event_id' 
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
