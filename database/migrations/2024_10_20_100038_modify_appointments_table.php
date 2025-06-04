<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Only run this if the table exists
        if (Schema::hasTable('appointments')) {
            Schema::table('appointments', function (Blueprint $table) {
                if (!Schema::hasColumn('appointments', 'patient_id')) {
                    $table->unsignedBigInteger('patient_id')->nullable(); // Use nullable to avoid issues
                    $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
                }
            });
        }
    }
        public function down(): void
    {
        // Revert only the added column, not the entire table
        if (Schema::hasTable('appointments') && Schema::hasColumn('appointments', 'patient_id')) {
            Schema::table('appointments', function (Blueprint $table) {
                $table->dropForeign(['patient_id']);
                $table->dropColumn('patient_id');
            });
        }
    }
};
