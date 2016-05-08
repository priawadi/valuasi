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
            $table->integer('lama_usaha')->nullable();
            $table->integer('status_usaha')->nullable();
            $table->string('mapen_sblm_keramba', 255)->nullable();
            $table->integer('luas_lahan')->nullable();
            $table->integer('keramba_total')->nullable();
            $table->integer('keramba_aktif')->nullable();
            $table->integer('keramba_tidak_aktif')->nullable();
            $table->string('jenis_komoditas')->nullable();
            $table->integer('waktu_pemeliharaan')->nullable();
            $table->integer('jum_siklus_panen')->nullable();

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
