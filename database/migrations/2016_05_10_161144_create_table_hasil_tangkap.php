<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHasilTangkap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_tangkap', function (Blueprint $table) {
            $table->increments('id_hasil_tangkap');
            $table->integer('id_responden');

            $table->integer('jenis_ikan')->nullable();
            $table->float('produksi_musim_puncak')->nullable();
            $table->float('produksi_musim_sedang')->nullable();
            $table->float('produksi_musim_paceklik')->nullable();

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
        Schema::drop('hasil_tangkap');
    }
}
