<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvEgytitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_egytitles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pdf');
            $table->unsignedBigInteger('invest_egyptmap_id');
            $table->foreign('invest_egyptmap_id')->references('id')->on('invest_egyptmaps')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_egytitles');
    }
}
