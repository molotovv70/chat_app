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
        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign('messages_chat_id_foreign');
            $table->dropColumn('chat_id');
        });
        Schema::rename('messages', 'user_messages');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_messages', function (Blueprint $table) {
            $table->foreignId('chat_id')->index()->constrained('chats');
        });
        Schema::rename('user_messages', 'messages');
    }
};
