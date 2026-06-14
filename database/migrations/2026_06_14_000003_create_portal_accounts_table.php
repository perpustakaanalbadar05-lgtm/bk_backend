<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portal_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // guru_bk yang membuat
            $table->string('name');
            $table->string('username')->unique();
            $table->string('password'); // hashed
            $table->enum('role', ['kepala_sekolah', 'pengawas', 'murid', 'orang_tua']);
            $table->string('siswa')->nullable(); // untuk portal murid/orang tua
            $table->string('kelas')->nullable();
            $table->json('visible_menus')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portal_accounts');
    }
};
