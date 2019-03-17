<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyerEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyer_enquiries', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('buyer_id');
            $table->string('name',50);
            $table->string('phone',20);
            $table->string('email_id',50);
            $table->text('message');
            $table->timestamps();
            $table->foreign("user_id")
                ->references("id")
                ->on("users")
                ->onDelete("cascade");
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
        Schema::dropIfExists('buyer_enquiries');
    }
}
