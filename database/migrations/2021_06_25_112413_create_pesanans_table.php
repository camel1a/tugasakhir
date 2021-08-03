<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->Increments('id_pesanan');
            $table->integer('id_konsumen')->unsigned();
            $table->foreign('id_konsumen')->references('id_konsumen')->on('konsumens');
            $table->integer('id_paket')->unsigned();
            $table->foreign('id_paket')->references('id_paket')->on('pakets');
            $table->integer('id_pegawai')->unsigned();
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawais');
            $table->integer('id_transportasi')->unsigned();
            $table->foreign('id_transportasi')->references('id_transportasi')->on('transportasis');
            $table->string('alamat');
            $table->date('tgl');
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
        Schema::dropIfExists('pesanans');
    }
}
