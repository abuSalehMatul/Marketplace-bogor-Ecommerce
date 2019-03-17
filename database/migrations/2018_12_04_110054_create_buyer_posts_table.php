<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyerPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyer_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('buyer_id');
            $table->string('unique_code',20);
            $table->string('title',100);
            $table->string('post_slug',100);
            $table->text('description');
            $table->tinyInteger('post_type')->comment('1 Buy, 2 Sell');
            $table->tinyInteger('product_type')->comment('1 New, 2 Used');
            $table->timestamps();
            $table->foreign("buyer_id")
                ->references("id")
                ->on("buyers")
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
        Schema::dropIfExists('buyer_posts');
    }
}
