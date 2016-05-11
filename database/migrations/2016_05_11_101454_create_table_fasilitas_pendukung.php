<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFasilitasPendukung extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fasilitas_pendukung', function (Blueprint $table) {
            $table->increments('id_fasilitas_pendukung');

            $table->integer('is_pertanyaan')->nullable();
            $table->string('fasilitas_pendukung', 200)->nullable();
            
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
        Schema::drop('fasilitas_pendukung');
    }
}
