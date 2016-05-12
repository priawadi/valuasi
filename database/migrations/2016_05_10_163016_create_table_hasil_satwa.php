<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHasilSatwa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_satwa', function (Blueprint $table) {
            $table->increments('id_hasil_satwa');
            $table->integer('id_master_pencari_satwa');
            $table->integer('id_responden');

            $table->integer('jumlah_satwa')->nullable();
            $table->double('harga_jual')->nullable();
            
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
        Schema::drop('hasil_satwa');
    }
}
