<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAlatBantuTangkap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alat_bantu_tangkap', function (Blueprint $table) {
            $table->increments('id_alat_bantu_tangkap');
            $table->integer('id_responden');
            
            $table->integer('jenis_alat_bantu')->nullable();
            $table->string('spesifikasi_ukuran', 200)->nullable();
            $table->integer('jumlah')->nullable();
            $table->string('satuan_jumlah', 30)->nullable();
            $table->float('harga_beli')->nullable();
            $table->float('umur_teknis')->nullable();
            
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
        Schema::drop('alat_bantu_tangkap');
    }
}
