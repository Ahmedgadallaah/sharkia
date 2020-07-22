<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenderTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tender_translations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->longText('description');
            $table->unsignedBigInteger('tender_id');
            $table->string('locale')->index();

            $table->unique(['tender_id', 'locale']);
            $table->foreign('tender_id')->references('id')->on('tenders')->onDelete('cascade');

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
        Schema::dropIfExists('tender_translations');
    }
}
