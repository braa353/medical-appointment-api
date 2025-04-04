<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id('RatingID');
            $table->foreignId('PatientID')->constrained('patients', 'PatientID', 'ratings_patients_PatientID')->onDelete('cascade');
            $table->foreignId('DoctorID')->constrained('doctors', 'DoctorID', 'ratings_doctors_DoctorID')->onDelete('cascade');
            $table->integer('RatingValue');
            $table->text('Comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
