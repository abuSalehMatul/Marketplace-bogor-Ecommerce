<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellerHelpsTable extends Migration
{
   
    public function up()
    {
        Schema::create('seller_helps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('icon_class');
            $table->text('short_description');
            $table->text('full_description');          
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('seller_helps');
    }
}
