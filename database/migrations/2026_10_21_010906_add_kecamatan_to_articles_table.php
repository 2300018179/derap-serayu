<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('articles', 'kecamatan')) {
            return;
        }

        Schema::table('articles', function (Blueprint $table) {
            $table->string('kecamatan', 100)
                ->nullable()
                ->index()
                ->after('category');
        });
    }

    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropIndex(['kecamatan']);
            $table->dropColumn('kecamatan');
        });
    }
};
