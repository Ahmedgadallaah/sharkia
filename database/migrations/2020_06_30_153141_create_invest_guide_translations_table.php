<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestGuideTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invest_guide_translations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('city');
            $table->string('company');
            $table->string('address');

            $table->unsignedBigInteger('invest_guide_id');
            $table->string('locale')->index();
            $table->unique(['invest_guide_id', 'locale']);
            $table->foreign('invest_guide_id')->references('id')->on('invest_guides')->onDelete('cascade');
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
        Schema::dropIfExists('invest_guide_translations');
    }
}
