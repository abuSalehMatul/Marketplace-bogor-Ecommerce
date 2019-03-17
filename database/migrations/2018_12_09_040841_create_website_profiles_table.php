<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebsiteProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('logo',200);
            $table->string('website_name',50);
            $table->string('email_id',100);
            $table->string('support_email_id',100);
            $table->string('phone_no',15);
            $table->string('fb_url',500);
            $table->string('youtube_url',500);
            $table->string('twitter_url',500);
            $table->string('inst_url',500);
            $table->string('gplus_url',500);
            $table->string('business_address',2000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('website_profiles');
    }
}
