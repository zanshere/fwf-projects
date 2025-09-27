<?php
// database/migrations/2025_09_27_084347_update_tickets_table_status.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Update status enum ke nilai baru
        DB::statement("ALTER TABLE tickets MODIFY status ENUM('proses', 'aktif', 'terpakai') DEFAULT 'proses'");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE tickets MODIFY status ENUM('Aktif', 'Sudah Digunakan') DEFAULT 'Aktif'");
    }
};
