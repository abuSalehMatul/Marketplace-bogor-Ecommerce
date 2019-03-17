<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Country extends Model
{
    public $timestamps = false;

     public function setCountryNameAttribute($value){
    	return $this->attributes['country_name']=ucfirst($value);
    }
}
