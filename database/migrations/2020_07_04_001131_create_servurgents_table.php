<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServurgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servurgents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('type', ['urgent', 'traffic', 'health','paper'])->default('urgent'); //city=المدن company=المدن directorate= المديريات body=الهيئات
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
        Schema::dropIfExists('servurgents');
    }
}
