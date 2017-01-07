<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('quran', function (Blueprint $table) {
            $table->increments('id');
            $table->string('surah');
            $table->string('aya');
            $table->string('aya_name');
            $table->string('aya_arab_name');
            $table->string('aya_arab_text');
            $table->string('aya_translate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('quran');
    }
}
