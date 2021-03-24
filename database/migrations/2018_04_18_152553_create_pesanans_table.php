<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('nama');
            $table->string('desain');
            $table->date('deadline');
              $table->integer('proses_id')->unsigned();
            $table->foreign('proses_id')->references('id')->on('proses');
            $table->string('deskripsi')->nullable();
             $table->integer('panjang');
              $table->integer('lebar');
               $table->integer('tinggi');
                $table->integer('jumlah');
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
