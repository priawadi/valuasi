<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePencariSatwa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pencari_satwa', function (Blueprint $table) {
            $table->increments('id_pencari_satwa');
            $table->integer('id_responden');

            $table->integer('pencari_satwa_mgv')->nullable();
            $table->integer('pengalaman_usaha')->nullable();
            $table->string('jenis_satwa', 20)->nullable();
            $table->integer('lama_buru')->nullable();
            $table->string('lama_buru_txt', 50)->nullable();
            $table->integer('setahun_buru')->nullable();
            $table->string('setahun_buru_txt', 50)->nullable();
            
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
        Schema::drop('pencari_satwa');
    }
}
