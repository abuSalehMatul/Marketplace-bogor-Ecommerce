<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function ProductStore()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function category()
    {
        return $this->hasOne(ProductCategory::class,'id','category_id');
    }

    public function seller()
    {
        return $this->belongsto(Seller::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
