<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMusimTangkap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musim_tangkap', function (Blueprint $table) {
            $table->increments('id_musim_tangkap');
            $table->integer('id_responden');
            
            $table->integer('jenis_ikan')->nullable();
            $table->string('bulan1', 1)->nullable();
            $table->string('bulan2', 1)->nullable();
            $table->string('bulan3', 1)->nullable();
            $table->string('bulan4', 1)->nullable();
            $table->string('bulan5', 1)->nullable();
            $table->string('bulan6', 1)->nullable();
            $table->string('bulan7', 1)->nullable();
            $table->string('bulan8', 1)->nullable();
            $table->string('bulan9', 1)->nullable();
            $table->string('bulan10', 1)->nullable();
            $table->string('bulan11', 1)->nullable();
            $table->string('bulan12', 1)->nullable();

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
        Schema::drop('musim_tangkap');
    }
}
