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
            $table->integer('kateg_biaya');
            $table->integer('kateg_modul');
            $table->integer('volume');
            $table->float('harga_satuan');
            $table->float('total');
            
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
