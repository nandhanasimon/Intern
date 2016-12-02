<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{

    public $table = "venue";

	protected $fillable = [
        'vname', 'category', 'mobileno', 'address','city_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       'remember_token',
    ];

    public function city()
    {
        return $this->hasOne('App\City');
    }
    
}
