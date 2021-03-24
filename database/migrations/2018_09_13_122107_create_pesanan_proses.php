<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesananProses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan_proses', function (Blueprint $table) {
           
            $table->integer('proses_id')->unsigned();
            $table->foreign('proses_id')->references('id')->on('proses');
            $table->integer('pesanan_id')->unsigned();
            $table->foreign('pesanan_id')->references('id')->on('pesanans');
            $table->integer('progress');
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
        Schema::dropIfExists('pesanan_proses');
    }
}
