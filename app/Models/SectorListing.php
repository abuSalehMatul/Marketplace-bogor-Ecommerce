<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SectorListing extends Model
{
    public function sectorfeature()
    {
        return $this->hasMany(SectorListingFeature::class);
    }
}
