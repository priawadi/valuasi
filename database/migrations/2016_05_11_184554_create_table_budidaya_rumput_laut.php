<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBudidayaRumputLaut extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budidaya_rumput_laut', function (Blueprint $table) {
            $table->increments('id_budidaya_rumput_laut');
            $table->integer('id_responden');
            
            $table->integer('lama_usaha')->nullable();
            $table->integer('status_usaha')->nullable();
            $table->string('pekerjaan_sebelumnya', 200)->nullable();
            $table->integer('pendapatan_bersih')->nullable();
            $table->boolean('is_ukuran_sama')->nullable();
            $table->integer('jumlah_lokasi')->nullable();
            $table->integer('status_kepemilikan')->nullable();
            $table->string('status_kepemilikan_lain', 100)->nullable();
            $table->string('jenis_rumput_laut', 30)->nullable();
            $table->integer('jumlah_panen')->nullable();

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
        Schema::drop('budidaya_rumput_laut');
    }
}
