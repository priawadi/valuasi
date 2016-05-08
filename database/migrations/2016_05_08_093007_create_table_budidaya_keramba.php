<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBudidayaKeramba extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budidaya_keramba', function (Blueprint $table) {
            $table->increments('id_budidaya_keramba');
            $table->integer('id_responden');
            $table->integer('lama_usaha');
            $table->integer('status_usaha');
            $table->string('mapen_sblm_keramba', 255);
            $table->integer('luas_lahan');
            $table->integer('keramba_total');
            $table->integer('keramba_aktif');
            $table->integer('keramba_tidak_aktif');
            $table->string('jenis_komoditas');
            $table->integer('waktu_pemeliharaan');
            $table->integer('jum_siklus_panen');

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
        Schema::drop('budidaya_keramba');
    }
}
