<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryListing extends Model
{
    public function countryfeature()
    {
        return $this->hasMany(CountryListingFeature::class);
    }
}
