<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoinCommunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('join_communities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fb',500);
            $table->string('twitter',500);
            $table->string('whatsapp',500);
            $table->string('gplus',500);
            $table->string('instagram',500);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('join_communities');
    }
}
