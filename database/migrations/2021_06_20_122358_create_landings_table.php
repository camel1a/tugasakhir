<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landings', function (Blueprint $table) {
            $table->Increments('id_landing');
            $table->string('bagian');
            $table->string('judul')->nullable();
            $table->string('foto')->nullable();
            $table->longtext('deskripsi')->nullable();
            $table->string('alamat')->nullable();
            $table->string('pertanyaan')->nullable();
            $table->string('jawaban')->nullable();
            $table->string('email')->nullable();
            $table->string('no_hp')->nullable();
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
        Schema::dropIfExists('landings');
    }
}
