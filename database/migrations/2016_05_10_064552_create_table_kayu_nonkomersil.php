<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKayuNonkomersil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kayu_nonkomersil', function (Blueprint $table) {
            $table->increments('id_kayu_nonkomersil');
            $table->integer('id_master_kayu');
            $table->integer('id_responden');

            $table->string('satuan', 30)->nullable();
            $table->integer('jumlah')->nullable();
            $table->float('harga')->nullable();
            $table->float('nilai_manfaat')->nullable();
            
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
        Schema::drop('kayu_nonkomersil');
    }
}
