<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePenangkapan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penangkapan', function (Blueprint $table) {
            $table->increments('id_penangkapan');
            $table->integer('id_responden');
            
            $table->integer('jumlah_hari')->nullable();
            $table->float('rata_jumlah')->nullable();
            $table->string('bulan_tdk_tangkap', 30)->nullable();
            $table->integer('penanganan_ikan')->nullable();
            $table->integer('penanganan_ikan_lain', 30)->nullable();
            $table->float('bagi_hasil_pemilik')->nullable();
            $table->float('bagi_hasil_awak')->nullable();
            
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
        Schema::drop('penangkapan');
    }
}
