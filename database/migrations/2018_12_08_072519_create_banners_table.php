<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
         $table->increments('id');
         $table->unsignedInteger('seller_id');
         $table->string('banner_image',200);
         $table->TinyInteger('status')->comment('0 Approved, 1 Not Approved');
         $table->TinyInteger('type')->comment('1 Top, 2 Bottom, 3 Sidebar');
         $table->timestamps();
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
        Schema::dropIfExists('banners');
    }
}
