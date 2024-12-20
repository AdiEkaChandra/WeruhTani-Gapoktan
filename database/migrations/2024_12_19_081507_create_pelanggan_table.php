<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelangganTable extends Migration
{
    public function up()
    {
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelanggan');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('jenis_gabah');
            $table->integer('berat');
            $table->integer('durasi');
            $table->enum('status', ['menunggu', 'berjalan', 'berhenti', 'selesai']);
            $table->timestamps();
        });        
    }

    public function down()
    {
        Schema::dropIfExists('pelanggan');
    }
}
