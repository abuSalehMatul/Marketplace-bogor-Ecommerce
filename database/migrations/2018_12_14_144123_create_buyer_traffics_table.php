<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyerTrafficsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyer_traffics', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('buyer_id');
            $table->string('ip_address',20);
            $table->text('page_name');
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
        Schema::dropIfExists('buyer_traffics');
    }
}
