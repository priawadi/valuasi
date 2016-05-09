<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMasterKomoditas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_komoditas', function (Blueprint $table) {
            $table->increments('id_master_komoditas');
            $table->integer('kateg_modul')->nullable();
            $table->string('komoditas', 100)->nullable();
            $table->string('satuan', 30)->nullable();
            
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
        Schema::drop('master_komoditas');
    }
}
