<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLokasiRumputLaut extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lokasi_rumput_laut', function (Blueprint $table) {
            $table->increments('id_lokasi_rumput_laut');
            $table->integer('id_responden');
            
            $table->integer('lokasi');
            $table->integer('panjang_bentang');
            $table->integer('jarak_antar_bentang');
            $table->integer('jumlah_bentang');

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
        Schema::drop('lokasi_rumput_laut');
    }
}
