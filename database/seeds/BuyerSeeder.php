<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class BuyerSeeder extends Seeder
{
    public function run()
    {
         App\Models\BuyerSafety::create([
            "full_description" => "Description here"
           
        ]);
    }
}
