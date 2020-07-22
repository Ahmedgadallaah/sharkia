<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisionTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vision_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('vision');
            $table->longText('goal');
            $table->longText('hope');
            $table->unsignedBigInteger('vision_id');
            $table->string('locale')->index();

            $table->unique(['vision_id', 'locale']);
            $table->foreign('vision_id')->references('id')->on('visions')->onDelete('cascade');
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
        Schema::dropIfExists('vision_translations');
    }
}
