<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_listings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id');
            $table->string('title',50);
            $table->string('slug',100);
            $table->decimal('price',10,2);
            $table->text('description');
            $table->string('featured_image',200);
            $table->string('upload_file',200);
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
        Schema::dropIfExists('country_listings');
    }
}
