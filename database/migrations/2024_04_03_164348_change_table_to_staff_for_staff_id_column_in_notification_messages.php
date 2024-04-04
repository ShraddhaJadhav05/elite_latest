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
        Schema::table('notification_messages', function (Blueprint $table) {
     // Drop foreign key constraint if it exists
     $table->dropForeign(['staff_id']);

     // Check if the column exists before adding it
     if (!Schema::hasColumn('notification_messages', 'staff_id')) {
         // Add new column staff_id constrained to staff table
         $table->unsignedBigInteger('staff_id')->nullable();
         $table->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade');
     }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notification_messages', function (Blueprint $table) {
           // Drop the foreign key constraint
           $table->dropForeign(['staff_id']);

           // Drop the staff_id column
           $table->dropColumn('staff_id');
        });
    }
};
