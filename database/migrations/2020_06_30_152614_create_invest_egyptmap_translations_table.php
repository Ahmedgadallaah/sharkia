<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestEgyptmapTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invest_egyptmap_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longtext('description');
            $table->unsignedBigInteger('invest_egyptmap_id');
            $table->string('locale')->index();

            $table->unique(['invest_egyptmap_id', 'locale']);
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
        Schema::dropIfExists('invest_egyptmap_translations');
    }
}
