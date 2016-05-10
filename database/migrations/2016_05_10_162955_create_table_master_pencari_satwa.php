<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMasterPencariSatwa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_pencari_satwa', function (Blueprint $table) {
            $table->increments('id_master_pencari_satwa');

            $table->integer('kategori')->nullable();
            $table->string('rincian', 100)->nullable();
            $table->string('satuan', 100)->nullable();
            
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
        Schema::drop('master_pencari_satwa');
    }
}
