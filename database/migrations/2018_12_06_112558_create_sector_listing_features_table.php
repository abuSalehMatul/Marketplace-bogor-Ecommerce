<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectorListingFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sector_listing_features', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sector_listing_id');
            $table->string('feature_name',200);
            $table->foreign("sector_listing_id")
                ->references("id")
                ->on("sector_listings")
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
        Schema::dropIfExists('sector_listing_features');
    }
}
