<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('blog_category_id');
            $table->string('unique_code',10);
            $table->string('title',50);
            $table->text('slug',500);
            $table->string('featured_image',200);
            $table->string('short_description',500);
            $table->text('full_description');
            $table->timestamps();
            $table->foreign("blog_category_id")
                ->references("id")
                ->on("blog_categories")
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
        Schema::dropIfExists('blogs');
    }
}
