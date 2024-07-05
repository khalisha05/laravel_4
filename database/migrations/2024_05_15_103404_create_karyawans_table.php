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
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->foreignId ('jabatan_id');
            $table->string('namakaryawan', length: 50);
            $table->enum('jeniskelamin', ['laki-laki', 'perempuan']);
            $table->text('alamat');
            $table->string('email', length: 30)->unique();
            $table->string('password', length: 50);
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
