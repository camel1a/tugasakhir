<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->Increments('id_transaksi');
            $table->integer('id_pesanan')->unsigned();
            $table->foreign('id_pesanan')->references('id_pesanan')->on('pesanans');
            $table->string('metode');
            $table->string('nominal');
            $table->string('pembayaran');
            $table->string('status');
            $table->date('tgl');
            $table->string('foto');
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
        Schema::dropIfExists('transaksis');
    }
}
