<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebsiteEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_enquiries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first',50);
            $table->string('lastname',50);
            $table->string('email',200);
            $table->string('phone',15);
            $table->string('message',500);
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
        Schema::dropIfExists('website_enquiries');
    }
}
