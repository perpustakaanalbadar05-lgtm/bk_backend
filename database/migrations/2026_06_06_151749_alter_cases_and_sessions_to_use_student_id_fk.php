<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Add student_id to cases
        Schema::table('cases', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id')->nullable()->after('id');
        });

        // 2. Map existing cases to students based on string 'siswa' matching 'nama'
        $cases = DB::table('cases')->get();
        foreach ($cases as $case) {
            $student = DB::table('students')->where('nama', $case->siswa)->first();
            if ($student) {
                DB::table('cases')->where('id', $case->id)->update(['student_id' => $student->id]);
            }
        }

        // 3. Add constraint and drop old column 'siswa' in cases
        Schema::table('cases', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->dropColumn('siswa');
        });

        // 1. Add student_id to counseling_sessions
        Schema::table('counseling_sessions', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id')->nullable()->after('id');
        });

        // 2. Map existing counseling_sessions to students based on string 'siswa' matching 'nama'
        $sessions = DB::table('counseling_sessions')->get();
        foreach ($sessions as $session) {
            $student = DB::table('students')->where('nama', $session->siswa)->first();
            if ($student) {
                DB::table('counseling_sessions')->where('id', $session->id)->update(['student_id' => $student->id]);
            }
        }

        // 3. Add constraint and drop old column 'siswa' in counseling_sessions
        Schema::table('counseling_sessions', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->dropColumn('siswa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('counseling_sessions', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
            $table->dropColumn('student_id');
            $table->string('siswa')->nullable();
        });

        Schema::table('cases', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
            $table->dropColumn('student_id');
            $table->string('siswa')->nullable();
        });
    }
};
