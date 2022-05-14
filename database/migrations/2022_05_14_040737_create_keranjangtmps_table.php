<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeranjangtmpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keranjangtmps', function (Blueprint $table) {
            $table->increments('id_keranjang');
            $table->string('id_transaksi');
            $table->string('id_buku');
            $table->date('tgl');
            $table->integer('stok');
            $table->string('ket');
            $table->float('total');
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
        Schema::dropIfExists('keranjangtmps');
    }
}
