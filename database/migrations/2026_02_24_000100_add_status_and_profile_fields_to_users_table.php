<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nis', 30)->nullable()->unique();
            $table->string('kelas', 50)->nullable();
            $table->string('gender', 20)->nullable();
            $table->string('jurusan', 20)->nullable();
            $table->string('status', 20)->default('pending')->index();
            $table->timestamp('verified_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['nis', 'kelas', 'gender', 'jurusan', 'status', 'verified_at']);
        });
    }
};
