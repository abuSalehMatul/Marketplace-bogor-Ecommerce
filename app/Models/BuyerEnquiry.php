<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuyerEnquiry extends Model
{
    public function user(){
    	return $this->belongsto("App\User");
    }
}
