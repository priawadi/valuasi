<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMesinPenggerak extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesin_penggerak', function (Blueprint $table) {
            $table->increments('id_mesin_penggerak');
            $table->integer('id_responden');
            
            $table->integer('jenis')->nullable();
            $table->string('merk', 200)->nullable();
            $table->integer('kekuatan')->nullable();
            $table->integer('jumlah')->nullable();
            $table->double('harga_beli')->nullable();
            $table->double('umur_teknis')->nullable();
            
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
        Schema::drop('mesin_penggerak');
    }
}
