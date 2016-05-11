<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOpsNelayan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ops_nelayan', function (Blueprint $table) {
            $table->increments('id_ops_nelayan');
            $table->integer('id_responden');
            $table->integer('id_master_biaya');

            $table->float('jumlah')->nullable();
            $table->float('harga_satuan')->nullable();
            $table->integer('total_biaya')->nullable();

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
        Schema::drop('ops_nelayan');
    }
}
