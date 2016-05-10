<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOpsSatwa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ops_satwa', function (Blueprint $table) {
            $table->increments('id_ops_satwa');
            $table->integer('id_master_pencari_satwa');
            $table->integer('id_responden');

            $table->integer('volume')->nullable();
            $table->float('harga_satuan')->nullable();
            $table->float('jumlah')->nullable();
            
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
        Schema::drop('ops_satwa');
    }
}
