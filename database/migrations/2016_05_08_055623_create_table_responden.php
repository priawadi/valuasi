<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableResponden extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responden', function (Blueprint $table) {
            $table->increments('id_responden');
            $table->string('nama', 255)->nullable();
            $table->string('telepon', 100)->nullable();
            $table->text('alamat')->nullable();
            $table->integer('umur')->nullable();
            $table->integer('jenis_kelamin')->nullable();
            $table->integer('pendidikan')->nullable();
            $table->double('lama_pendidikan')->nullable();
            $table->integer('stat_kawin')->nullable();
            $table->integer('jum_ang_kel_total')->nullable();
            $table->integer('jum_ang_kel_anak')->nullable();
            $table->integer('jum_ang_kel_dewasa')->nullable();
            $table->integer('stat_keluarga')->nullable();
            $table->integer('pendapatan')->nullable();
            $table->integer('pekerjaan_utama')->nullable();
            $table->integer('pekerjaan_sampingan')->nullable();
            $table->string('nama_pencacah', 255)->nullable();
            $table->timestamp('tanggal_input')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('responden');
    }
}
