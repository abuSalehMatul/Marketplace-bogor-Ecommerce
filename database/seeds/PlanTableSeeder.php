<?php

use Illuminate\Database\Seeder;

class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\SellerPlan::create(['plan_name' => 'Basic','charge'=>'50','plan_month'=>'12','description'=>'']);
        \App\Models\SellerPlan::create(['plan_name' => 'Silver','charge'=>'50','plan_month'=>'12','description'=>'']);
        \App\Models\SellerPlan::create(['plan_name' => 'Premium','charge'=>'50','plan_month'=>'12','description'=>'']);
    }
}
