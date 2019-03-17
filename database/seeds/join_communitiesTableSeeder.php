<?php

use Illuminate\Database\Seeder;

class join_communitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\JoinCommunity::create([
            "fb" => "#",
            "twitter" => "#",
            "whatsapp" => "#",
            "gplus" => "#",
            "instagram" => "#"
        ]);
    }
}
