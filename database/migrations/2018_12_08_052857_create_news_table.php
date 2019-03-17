<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->string('unique_code',10);
            $table->string('title',50);
            $table->text('slug',500);
            $table->string('featured_image',200);
            $table->string('short_description',500);
            $table->text('full_description');
            $table->timestamps();
            $table->foreign("category_id")
                ->references("id")
                ->on("news_categories")
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
        Schema::dropIfExists('news');
    }
}
