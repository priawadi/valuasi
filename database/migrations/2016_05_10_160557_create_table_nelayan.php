<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNelayan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nelayan', function (Blueprint $table) {
            $table->increments('id_nelayan');
            $table->integer('id_responden');

            $table->boolean('is_nelayan')->default(FALSE);
            $table->integer('lama_bekerja')->nullable();
            $table->integer('status_kepemilikan')->nullable();
            $table->integer('status_kedudukan')->nullable();
            $table->string('status_kedudukan_lain', 100)->nullable();
            
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
        Schema::drop('nelayan');
    }
}
