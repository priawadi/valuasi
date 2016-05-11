<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBiayaPerjalanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biaya_perjalanan', function (Blueprint $table) {
            $table->increments('id_biaya_perjalanan');
            $table->integer('id_responden');

            $table->integer('jenis_rombongan')->nullable();
            $table->integer('jumlah_orang')->nullable();
            $table->integer('penyelenggara')->nullable();
            $table->integer('jenis_transportasi')->nullable();
            
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
        Schema::drop('biaya_perjalanan');
    }
}
