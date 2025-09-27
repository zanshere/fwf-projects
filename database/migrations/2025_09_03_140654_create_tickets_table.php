// File: database/migrations/2025_09_03_140654_create_tickets_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('guest_email')->nullable();
            $table->string('guest_name')->nullable();
            $table->enum('ticket_type', ['Reguler', 'Premium', 'Khusus'])->default('Reguler');
            $table->integer('quantity')->default(1);
            $table->integer('adult_count')->default(0);
            $table->integer('child_count')->default(0);
            $table->date('purchase_date');
            $table->enum('status', ['proses', 'aktif', 'terpakai'])->default('proses');
            $table->integer('points_earned')->default(0);
            $table->string('barcode')->unique();
            $table->decimal('total_price', 10, 2)->default(0);
            $table->string('detail_file')->nullable();
            $table->timestamps();

            $table->index(['user_id', 'status']);
            $table->index('purchase_date');
            $table->index('guest_email');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tickets');
    }
};
