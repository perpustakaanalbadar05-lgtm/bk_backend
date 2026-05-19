<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Add ringkasan to counseling_sessions
        Schema::table('counseling_sessions', function (Blueprint $table) {
            $table->text('ringkasan')->nullable()->after('durasi');
        });

        // Add nip & hp to users for profile
        Schema::table('users', function (Blueprint $table) {
            $table->string('nip')->nullable()->after('name');
            $table->string('hp')->nullable()->after('nip');
        });
    }

    public function down(): void
    {
        Schema::table('counseling_sessions', function (Blueprint $table) {
            $table->dropColumn('ringkasan');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['nip', 'hp']);
        });
    }
};
