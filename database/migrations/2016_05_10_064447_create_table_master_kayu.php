<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMasterKayu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_kayu', function (Blueprint $table) {
            $table->increments('id_master_kayu');
            $table->integer('id_responden');

            $table->string('rincian', 50)->nullable();
            $table->integer('kategori')->nullable();
            
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
        Schema::drop('master_kayu');
    }
}
