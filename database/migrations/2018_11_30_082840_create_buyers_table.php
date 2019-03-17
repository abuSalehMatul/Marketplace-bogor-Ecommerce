<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('unique_code',10);
            $table->string('first_name',50);
            $table->string('last_name',50);
            $table->TinyInteger('instant_type')->comment('1 WhatsApp, 2 Skype, 3 WeChat');
            $table->string('instant_id',50);
            $table->string('company_name',100)->nullable();
            $table->string('company_slug',100)->nullable();
            $table->integer('business_sector')->nullable()->nullable();;
            $table->TinyInteger('company_status')->comment('1 Agent, 2 End User, 3 Reseller')->nullable();
            $table->string('designation',50)->nullable();
            $table->string('contact_number',50)->nullable();
            $table->string('website',50)->nullable();
            $table->string('address1',50)->nullable();
            $table->string('address2',50)->nullable();
            $table->string('city',50)->nullable();
            $table->string('state',50)->nullable();
            $table->integer('country')->nullable();
            $table->string('postal',50)->nullable();
            $table->integer('buy_in')->nullable()->nullable();
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
        Schema::dropIfExists('buyers');
    }
}
