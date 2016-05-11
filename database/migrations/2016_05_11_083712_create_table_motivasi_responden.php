<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMotivasiResponden extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motivasi_responden', function (Blueprint $table) {
            $table->increments('id_motivasi_responden');
            $table->integer('id_responden');

            $table->integer('id_pertanyaan')->nullable();
            $table->integer('jawaban')->nullable();
            $table->string('jawaban_lain', 100)->nullable();
            
            $table->softDeletes();
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
        Schema::drop('motivasi_responden');
    }
}
