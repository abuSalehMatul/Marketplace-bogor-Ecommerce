<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellerProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('seller_id');
            $table->string('logo',200);
            $table->text('profile_description');
            $table->foreign("seller_id")
                ->references("id")
                ->on("sellers")
                ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seller_profiles');
    }
}
