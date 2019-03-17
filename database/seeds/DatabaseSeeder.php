<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserRolesSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(KnowtosTableSeeder::class);
        $this->call(join_communitiesTableSeeder::class);
        $this->call(Website_profilesTableSeeder::class);
        $this->call(PlanTableSeeder::class);
        $this->call(BuyerSeeder::class);
        $this->call(SellerSeeder::class);
    }
}
