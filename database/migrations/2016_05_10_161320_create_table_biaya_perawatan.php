<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBiayaPerawatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biaya_perawatan', function (Blueprint $table) {
            $table->increments('id_biaya_perawatan');
            $table->integer('id_responden');

            $table->integer('jenis_biaya_perawatan')->nullable();
            $table->integer('biaya')->nullable();
            
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
        Schema::drop('biaya_perawatan');
    }
}
