<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->unsignedSmallInteger('arrival_year')->nullable()->after('publisher');
        });

        // Jika kolom arrived_at masih ada, migrasikan tahun
        if (Schema::hasColumn('books', 'arrived_at')) {
            \DB::table('books')
                ->whereNotNull('arrived_at')
                ->update(['arrival_year' => \DB::raw('YEAR(arrived_at)')]);

            Schema::table('books', function (Blueprint $table) {
                $table->dropColumn('arrived_at');
            });
        }
    }

    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->date('arrived_at')->nullable()->after('publisher');
        });

        // Kembalikan data tahun ke arrived_at (asumsikan 1 Jan tahun tsb)
        \DB::table('books')
            ->whereNotNull('arrival_year')
            ->update(['arrived_at' => \DB::raw('STR_TO_DATE(CONCAT(arrival_year, "-01-01"), "%Y-%m-%d")')]);

        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('arrival_year');
        });
    }
};
