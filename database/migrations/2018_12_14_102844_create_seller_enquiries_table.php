<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellerEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_enquiries', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('seller_id');
            $table->string('name',50);
            $table->string('phone',20);
            $table->string('email_id',50);
            $table->text('message');
            $table->timestamps();
            $table->foreign("user_id")
                ->references("id")
                ->on("users")
                ->onDelete("cascade");
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
        Schema::dropIfExists('seller_enquiries');
    }
}
