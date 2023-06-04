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
        Schema::create('produkhukum', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('deskripsi');
            $table->string('id_kategori');
            $table->string('nama_file');
            $table->string('path_file');
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
        Schema::dropIfExists('produkhukum');
    }
};
