<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SellerPurchasePlan extends Model
{
    public function sellerplan(){
    	return $this->belongsto(SellerPlan::class,'plan_id');
    }
}
