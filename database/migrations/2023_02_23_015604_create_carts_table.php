<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('user_id');
            $table->string('status_cart');// ada 2 yaitu cart, dipinjam
            $table->string('status_peminjaman');// ada 2 yaitu belum dan sudah
            $table->date('tanggal_kembali')->nullable();
            $table->string('status_pengembalian')->nullable(); 
            $table->date('dikembalikan_pada')->nullable();
            $table->string('denda'); 
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
        Schema::dropIfExists('carts');
    }
};
