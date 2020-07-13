<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShaflagcatTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shaflagcat_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('name');
            $table->unsignedBigInteger('shaflagcat_id');
            $table->string('locale')->index();

            $table->unique(['shaflagcat_id', 'locale']);
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
        Schema::dropIfExists('shaflagcat_translations');
    }
}
