<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKayuOps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kayu_ops', function (Blueprint $table) {
            $table->increments('id_kayu_ops');
            $table->integer('id_master_kayu');
            $table->integer('id_responden');

            $table->double('biaya')->nullable();
            $table->integer('jumlah')->nullable();
            $table->double('total_biaya')->nullable();
            
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
        Schema::drop('kayu_ops');
    }
}
