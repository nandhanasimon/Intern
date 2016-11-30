<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
	protected $fillable = [
        'vname', 'category', 'mobileno', 'address',
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