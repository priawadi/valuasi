<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDaerahOperasional extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daerah_operasional', function (Blueprint $table) {
            $table->increments('id_daerah_operasional');
            $table->integer('id_responden');
            
            $table->string('lokasi', 200)->nullable();
            $table->float('jarak_dr_pantai')->nullable();
            $table->float('waktu_tempuh')->nullable();
            $table->integer('zona')->nullable();
            $table->string('bulan', 200)->nullable();

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
        Schema::drop('daerah_operasional');
    }
}
