<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('chirps', function (Blueprint $chirps) {
            $chirps->integer('likes')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('chirps', function (Blueprint $chirps) {
            $chirps->dropColumn('likes');
        });
    }
};
