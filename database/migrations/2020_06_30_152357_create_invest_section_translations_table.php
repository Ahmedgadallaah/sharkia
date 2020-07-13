<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestSectionTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invest_section_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longtext('description');
            $table->unsignedBigInteger('invest_section_id');
            $table->string('locale')->index();

            $table->unique(['invest_section_id', 'locale']);
            $table->foreign('invest_section_id')->references('id')->on('invest_sections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invest_section_translations');
    }
}
