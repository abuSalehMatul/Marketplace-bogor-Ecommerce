<?php

use Illuminate\Database\Seeder;

class Website_profilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\WebsiteProfile::create([
            "logo" => "#",
            "website_name" => "#",
            "email_id" => "#",
            "support_email_id" => "#",
            "phone_no" => "#",
            "fb_url" => "#",
            "youtube_url" => "#",
            "twitter_url" => "#",
            "inst_url" => "#",
            "gplus_url" => "#",
            "business_address" => "#"
        ]);
    }
}
