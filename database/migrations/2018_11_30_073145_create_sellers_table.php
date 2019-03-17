<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unique_code',10);
            $table->unsignedInteger('user_id');
            $table->string('first_name',50);
            $table->string('last_name',50);
            $table->TinyInteger('instant_type')->comment('1 WhatsApp, 2 Skype, 3 WeChat');
            $table->string('instant_id',50);
            $table->string('company_name',100)->nullable();
            $table->string('company_slug',100)->nullable();
            $table->integer('business_sector')->comment('category id')->nullable();;
            $table->TinyInteger('company_status')->comment('1 Manufacturer, 2 Exporter')->nullable();
            $table->string('designation',50)->nullable();
            $table->string('contact_number',50)->nullable();
            $table->string('website',50)->nullable();
            $table->string('address1',50)->nullable();
            $table->string('address2',50)->nullable();
            $table->string('city',50)->nullable();
            $table->string('state',50)->nullable();
            $table->integer('country')->nullable();
            $table->string('postal',10)->nullable();
            $table->TinyInteger('sell_in')->comment('1 In africa, 2 in Global')->nullable();
            $table->Tinyinteger('data_status')->default(0)->comment('0 Not filled , 1 Filled');;
            $table->SoftDeletes();
            $table->timestamps();
            $table->foreign("user_id")
                    ->references("id")
                    ->on("users")
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
        Schema::dropIfExists('sellers');
    }
}
