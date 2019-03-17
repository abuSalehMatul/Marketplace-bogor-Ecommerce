<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellerTrafficsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_traffics', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('seller_id');
            $table->string('ip_address',20);
            $table->text('page_name');
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
        Schema::dropIfExists('seller_traffics');
    }
}
