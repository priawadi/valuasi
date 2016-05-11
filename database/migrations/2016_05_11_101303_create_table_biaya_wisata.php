<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBiayaWisata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biaya_wisata', function (Blueprint $table) {
            $table->increments('id_biaya_wisata');
            $table->integer('id_responden');

            $table->integer('jenis_pengeluaran')->nullable();
            $table->float('biaya')->nullable();
            $table->float('jumlah')->nullable();
            $table->string('satuan_jumlah', 30)->nullable();
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
        Schema::drop('biaya_wisata');
    }
}
