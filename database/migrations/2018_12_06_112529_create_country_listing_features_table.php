<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryListingFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_listing_features', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('country_listing_id');
            $table->string('feature_name',200);
            $table->foreign("country_listing_id")
                ->references("id")
                ->on("country_listings")
                ->onDelete("cascade");
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
        Schema::dropIfExists('country_listing_features');
    }
}
