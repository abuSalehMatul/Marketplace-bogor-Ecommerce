<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{

    public function setFirstNameAttribute($value){
        return $this->attributes['first_name']=ucfirst($value);
    }

    public function setLastNameAttribute($value){
        return $this->attributes['last_name']=ucfirst($value);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function sellerprofile(){
        return $this->Hasone(SellerProfile::class);
    }

    public function sellercountry(){
        return $this->Hasone(Country::class,'id','country');
    }
}
