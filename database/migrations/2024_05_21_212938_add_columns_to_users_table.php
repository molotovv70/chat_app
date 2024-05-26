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
        Schema::table('users', function (Blueprint $table) {
            // Unique Name starts with '@'
            $table->string('username', 50)->nullable()->unique()->after('email');

            $table->string('avatar_path', 1500)->nullable()->after('username');
            $table->string('description', 500)->nullable()->after('avatar_path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
            $table->dropColumn('avatar_path');
            $table->dropColumn('description');
        });
    }
};
