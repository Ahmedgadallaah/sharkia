<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShaflagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shaflags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image');
            $table->unsignedBigInteger('shaflagcat_id');
            $table->foreign('shaflagcat_id')->references('id')->on('shaflagcats')->onDelete('cascade');
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
        Schema::dropIfExists('shaflags');
    }
}
