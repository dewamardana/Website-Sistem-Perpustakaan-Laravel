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
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->string('kode_buku')->unique();
            $table->foreignId('user_id');
            $table->string('judul');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->string('deskripsi')->nullable();
            $table->foreignId('kategori_id');
            $table->string('penulis');
            $table->foreignId('penerbit_id');
            $table->string('status')->default('publish');
            $table->timestamp('dibuat_pada')->nullable();
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
        Schema::dropIfExists('bukus');
    }
};
