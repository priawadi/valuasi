<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBiaya extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biaya', function (Blueprint $table) {
            $table->increments('id_biaya');
            $table->integer('id_responden');
            $table->integer('id_master_biaya');

            $table->integer('kateg_biaya')->nullable();
            $table->integer('kateg_modul')->nullable();
            $table->integer('volume')->nullable();
            $table->float('harga_satuan')->nullable();
            $table->float('total')->nullable();
            
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
        Schema::drop('biaya');
    }
}
