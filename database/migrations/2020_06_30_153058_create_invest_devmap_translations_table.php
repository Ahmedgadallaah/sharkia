<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestDevmapTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invest_devmap_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longtext('description');
            $table->unsignedBigInteger('invest_devmap_id');
            $table->string('locale')->index();

            $table->unique(['invest_devmap_id', 'locale']);
            $table->foreign('invest_devmap_id')->references('id')->on('invest_devmaps')->onDelete('cascade');

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
        Schema::dropIfExists('invest_devmap_translations');
    }
}
