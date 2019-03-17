<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            "name" => "KCE",
            "email" => "admin@gmail.com",
            "status" => 1,
            "password" => bcrypt("123456")
        ]);
        $user->assignRole("admin");
    }
}
