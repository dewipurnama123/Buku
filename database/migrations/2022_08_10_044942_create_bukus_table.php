<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->increments('id_buku');
            $table->string('id_kategori');
            $table->string('judul');
            $table->string('penerbit');
            $table->string('pengarang');
            $table->string('tahun');
            $table->integer('harga');
            $table->integer('stok');
            $table->integer('berat');
            $table->string('gambar')->nullable;
            $table->text('desc');
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
        Schema::dropIfExists('tb_bukus');
    }
}
