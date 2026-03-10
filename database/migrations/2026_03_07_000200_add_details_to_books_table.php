<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->string('code', 50)->nullable()->after('id')->index();
            $table->string('class', 20)->nullable()->after('code');
            $table->string('publisher', 150)->nullable()->after('author');
            $table->date('arrived_at')->nullable()->after('publisher');
        });
    }

    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn(['code', 'class', 'publisher', 'arrived_at']);
        });
    }
};
