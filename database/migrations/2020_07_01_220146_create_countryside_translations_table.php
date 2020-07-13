<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountrysideTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countryside_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longtext('description');
            $table->unsignedBigInteger('countryside_id');
            $table->string('locale')->index();

            $table->unique(['countryside_id', 'locale']);
            $table->foreign('countryside_id')->references('id')->on('countrysides')->onDelete('cascade');
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
        Schema::dropIfExists('countryside_translations');
    }
}
