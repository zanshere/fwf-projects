<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('type'); // visit, points_earned, points_used, etc
            $table->string('description');
            $table->integer('points_earned')->default(0);
            $table->integer('points_used')->default(0);
            $table->date('activity_date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_activities');
    }
};
