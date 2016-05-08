<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHasilPanen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_panen', function (Blueprint $table) {
            $table->increments('id_hasil_panen');
            $table->integer('id_responden');

            $table->integer('kateg_modul');
            $table->integer('id_master_komoditas');
            $table->integer('jumlah');
            $table->integer('harga_jual');
            $table->integer('jumlah_penerimaan');
            
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
        Schema::drop('hasil_panen');
    }
}
