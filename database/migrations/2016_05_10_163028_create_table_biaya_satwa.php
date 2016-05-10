<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBiayaSatwa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biaya_satwa', function (Blueprint $table) {
            $table->increments('id_biaya_satwa');
            $table->integer('id_master_pencari_satwa');
            $table->integer('id_responden');

            $table->integer('volume')->nullable();
            $table->float('harga_beli')->nullable();
            $table->integer('umur_ekonomis')->nullable();
            
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
        Schema::drop('biaya_satwa');
    }
}
