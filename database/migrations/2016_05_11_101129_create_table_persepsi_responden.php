<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePersepsiResponden extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persepsi_responden', function (Blueprint $table) {
            $table->increments('id_persepsi_responden');
            $table->integer('id_responden');

            $table->integer('id_fasilitas_pendukung')->nullable();
            $table->integer('ketersediaan')->nullable();
            $table->integer('jumlah')->nullable();
            $table->integer('kondisi')->nullable();
            
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
        Schema::drop('persepsi_responden');
    }
}
