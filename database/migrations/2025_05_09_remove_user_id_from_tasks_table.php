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
        Schema::table('tasks', function (Blueprint $table) {
            // Drop the foreign key first
            $table->dropForeign(['user_id']);
            // Then drop the column
            $table->dropColumn('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            // Add back the column and foreign key if needed to rollback
            $table->unsignedBigInteger('user_id')->after('status');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
};