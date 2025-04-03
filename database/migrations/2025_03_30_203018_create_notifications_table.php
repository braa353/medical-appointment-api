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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id('NotificationID');
            $table->foreignId('UserID')->constrained('users','UserID','notifications_users_UserID')->onDelete('cascade');
            $table->text('Message');
            $table->enum('NotificationType', ['NewAppointment', 'Cancellation', 'Rating', 'Reminder']);
            $table->boolean('IsRead')->default(false);
            $table->timestamp('CreatedAt');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
