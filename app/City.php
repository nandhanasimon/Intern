<?php

namespace App;
//use App\Models\City;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $table = "city";
    protected $fillable = [
        'city_name',
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
