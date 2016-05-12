<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDetilProduksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detil_produksi', function (Blueprint $table) {
            $table->increments('id_detil_produksi');
            $table->integer('id_responden');

            $table->integer('jenis_musim')->nullable();
            $table->integer('kondisi_rumput_laut')->nullable();
            $table->integer('jenis_rumput_laut')->nullable();

            $table->integer('volume')->nullable();
            $table->integer('harga_satuan')->nullable();
            
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
        Schema::drop('detil_produksi');
    }
}
