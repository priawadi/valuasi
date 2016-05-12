<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProduksiRumputLaut extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produksi_rumput_laut', function (Blueprint $table) {
            $table->increments('id_produksi_rumput_laut');
            $table->integer('id_responden');

            $table->integer('jenis_musim')->nullable();
            $table->integer('awal_bulan')->nullable();
            $table->integer('akhir_bulan')->nullable();
            $table->integer('total_panen')->nullable();

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
        Schema::drop('produksi_rumput_laut');
    }
}
