<?php

use Illuminate\Database\Seeder;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       App\Models\SellerSafety::create([
            "full_description" => "Description here.."
           
        ]);
    }
}
