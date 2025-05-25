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
       // Migration file for appointments
Schema::table('appointments', function (Blueprint $table) {
    // Add the patient_id column if it doesn't exist
    if (!Schema::hasColumn('appointments', 'patient_id')) {
        $table->unsignedBigInteger('patient_id'); // Add patient_id
    }

    // Ensure foreign key is set up with cascade on delete
    $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
