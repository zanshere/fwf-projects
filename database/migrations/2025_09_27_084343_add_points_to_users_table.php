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
            $table->integer('points')->default(0)->after('email');
            $table->string('member_level')->default('Bronze')->after('points');
            $table->integer('total_visits')->default(0)->after('member_level');
            $table->date('member_since')->nullable()->after('total_visits');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['points', 'member_level', 'total_visits', 'member_since']);
        });
    }
};
