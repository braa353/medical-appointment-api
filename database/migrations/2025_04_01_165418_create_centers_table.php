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
        Schema::create('centers', function (Blueprint $table) {
            $table->id('CenterID');
            $table->foreignId('UserId')->constrained('users', 'UserID', 'centers_users_UserID')->onDelete('cascade');
            $table->string('Name');
            $table->foreignId('LocationID')->constrained('locations', 'LocationID', 'centers_locations_LocationID')->onDelete('cascade');
            $table->foreignId('DoctorID')->constrained('doctors', 'DoctorID', 'centers_doctors_DoctorID')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centers');
    }
};
