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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id('AppointmentID');
            $table->foreignId('PatientID')->constrained('patients', 'PatientID', 'appointments_patients_PatientID')->onDelete('cascade');
            $table->foreignId('DoctorID')->constrained('doctors', 'DoctorID', 'appointments_doctors_DoctorID')->onDelete('cascade');
            $table->foreignId('ScheduleID')->constrained('schedules', 'ScheduleID', 'appointments_schedules_ScheduleID')->onDelete('cascade');
            $table->date('AppointmentDate');
            $table->time('AppointmentTime');
            $table->enum('Status', ['Pending', 'Accepted', 'Rejected', 'Completed']);
            $table->timestamp('CreatedAt');
            $table->timestamp('UpdatedAt')->nullable();
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
