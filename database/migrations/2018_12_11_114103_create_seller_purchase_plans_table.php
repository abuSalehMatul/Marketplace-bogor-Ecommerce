<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellerPurchasePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_purchase_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('plan_id');
            $table->unsignedInteger('seller_id');
            $table->text('invoice_no');
            $table->decimal('purchase_price');
            $table->date('start_date');
            $table->date('end_date');
            $table->tinyInteger('plan_status')->default(0)->comment('0 inactive, 1 active');
            $table->timestamps();
            $table->SoftDeletes();
            $table->foreign("plan_id")
                ->references("id")
                ->on("seller_plans")
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
        Schema::dropIfExists('seller_purchase_plans');
    }
}
