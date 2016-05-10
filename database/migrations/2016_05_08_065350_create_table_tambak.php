<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTambak extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tambak', function (Blueprint $table) {
            $table->increments('id_tambak');
            $table->integer('id_responden');

            $table->integer('lama_tambak')->nullable();
            $table->integer('status_tambak')->nullable();
            $table->string('mapen_sblm_tambak', 150)->nullable();
            $table->integer('luas_tambak')->nullable();
            $table->integer('status_kepem_tambak')->nullable();
            $table->string('jenis_komoditas_tambak', 10)->nullable();
            $table->integer('waktu_pemeliharaan_tambak')->nullable();
            $table->integer('jum_panen_tambak')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tambak');
    }
}
