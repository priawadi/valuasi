<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableExistenceValue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('existence_value', function (Blueprint $table) {
            $table->increments('id_existence_value');
            $table->integer('id_responden');

            $table->integer('keindahan')->nullable();
            $table->integer('spiritual')->nullable();
            $table->integer('budaya')->nullable();
            $table->integer('anekaragam')->nullable();
            $table->integer('tkt_kepentingan')->nullable();
            $table->integer('sedia_lestari')->nullable();
            $table->integer('korban_tenaga')->nullable();
            $table->double('sumbang_iuran')->nullable();
            
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
        Schema::drop('existence_value');
    }
}
