<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->Increments('id_jadwal');
            $table->integer('id_konsumen')->unsigned();
            $table->foreign('id_konsumen')->references('id_konsumen')->on('konsumens');
            $table->integer('id_pegawai')->unsigned();
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawais');
            $table->date('tgl');
            $table->string('kepentingan');
            $table->string('status');
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
        Schema::dropIfExists('jadwals');
    }
}
