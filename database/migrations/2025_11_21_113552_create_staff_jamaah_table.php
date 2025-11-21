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
        Schema::create('staff_jamaah', function (Blueprint $table) {
    $table->id();
    $table->string('nama');
    $table->string('nik')->unique();
    $table->string('jenis_kelamin');
    $table->string('tempat_lahir');
    $table->date('tanggal_lahir');
    $table->text('alamat');
    $table->string('wa')->nullable();
    $table->string('kelompok')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_jamaah');
    }
};
