<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('seller_id');
            $table->string('unique_code',10);
            $table->string('product_name',50);
            $table->decimal('product_price',10,2)->nullable();
            $table->string('short_description',500);
            $table->text('full_description');
            $table->string('product_slug',100);
            $table->string('featured_image',100);
            $table->tinyInteger('post_type')->comment('1 Buy, 2 Sell');
            $table->tinyInteger('product_type')->comment('1 New, 2 Used');
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
        Schema::dropIfExists('products');
    }
}
