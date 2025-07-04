<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
{
    Schema::create('bimbels', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->text('alamat');
        $table->integer('biaya'); // ribuan
        $table->integer('jarak'); // meter
        $table->integer('fasilitas'); // 3 = kurang, 5 = sedang, 8 = lengkap
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimbels');
    }
};
