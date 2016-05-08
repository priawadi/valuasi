<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMasterBiaya extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_biaya', function (Blueprint $table) {
            $table->increments('id_master_biaya');
            $table->integer('kateg_biaya')->nullable();
            $table->integer('kateg_modul')->nullable();
            $table->string('biaya', 150)->nullable();
            $table->string('satuan', 50)->nullable();

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
        Schema::drop('master_biaya');
    }
}
