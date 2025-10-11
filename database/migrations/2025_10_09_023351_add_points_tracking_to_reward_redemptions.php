<?php
// database/migrations/2025_xx_xx_add_points_tracking_to_reward_redemptions.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reward_redemptions', function (Blueprint $table) {
            $table->integer('points_before')->after('points_used');
            $table->integer('points_after')->after('points_before');
            $table->text('admin_notes')->nullable()->after('notes');
            $table->timestamp('approved_at')->nullable()->after('processed_at');
            $table->foreignId('approved_by')->nullable()->after('approved_at')->constrained('users');
        });
    }

    public function down(): void
    {
        Schema::table('reward_redemptions', function (Blueprint $table) {
            $table->dropColumn(['points_before', 'points_after', 'admin_notes', 'approved_at', 'approved_by']);
        });
    }
};
