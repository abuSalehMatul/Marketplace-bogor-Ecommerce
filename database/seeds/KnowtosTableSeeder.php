<?php

use Illuminate\Database\Seeder;

class KnowtosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Knowto::create(["known_name" => "Friends"]);
        App\Models\Knowto::create(["known_name" => "Referral"]);
        App\Models\Knowto::create(["known_name" => "Online"]);
        App\Models\Knowto::create(["known_name" => "Email"]);
        App\Models\Knowto::create(["known_name" => "Tv Ad"]);
        App\Models\Knowto::create(["known_name" => "Radio"]);
        App\Models\Knowto::create(["known_name" => "Social Media"]);
        App\Models\Knowto::create(["known_name" => "Other"]);
    }
}
