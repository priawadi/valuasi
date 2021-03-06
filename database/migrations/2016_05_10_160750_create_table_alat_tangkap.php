<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAlatTangkap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alat_tangkap', function (Blueprint $table) {
            $table->increments('id_alat_tangkap');
            $table->integer('id_responden');

            $table->integer('jenis_alat_tangkap')->nullable();
            $table->string('nama', 150)->nullable();
            $table->double('panjang')->nullable();
            $table->double('lebar')->nullable();
            $table->double('tinggi')->nullable();
            $table->integer('jumlah')->nullable();
            $table->string('satuan_jumlah', 30)->nullable();
            $table->double('harga_beli')->nullable();
            $table->string('satuan_harga_beli', 30)->nullable();
            $table->double('umur_teknis')->nullable();
            
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
        Schema::drop('alat_tangkap');
    }
}
