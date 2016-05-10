<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKayuProd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kayu_prod', function (Blueprint $table) {
            $table->increments('id_kayu_prod');
            $table->integer('id_master_kayu');
            $table->integer('id_responden');

            $table->string('satuan', 30)->nullable();
            $table->integer('produksi')->nullable();
            $table->float('harga')->nullable();
            $table->float('nilai_prod')->nullable();
            
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
        Schema::drop('kayu_prod');
    }
}
