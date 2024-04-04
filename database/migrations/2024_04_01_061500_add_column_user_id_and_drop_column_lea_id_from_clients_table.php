<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
         // Disable foreign key checks
         DB::statement('SET FOREIGN_KEY_CHECKS=0');
         
        Schema::table('clients', function (Blueprint $table) {
            // Add the new foreign key column
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Drop the foreign key constraint
            $table->dropForeign(['lead_id']);

            // Drop the foreign key column
            $table->dropColumn('lead_id');
        });

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         // Disable foreign key checks
         DB::statement('SET FOREIGN_KEY_CHECKS=0');

        Schema::table('clients', function (Blueprint $table) {
            // Start a transaction to ensure atomicity
            $table->foreignId('lead_id')->constrained('users')->onDelete('cascade');

            // Drop the added column
            $table->dropColumn('user_id');
        });

         // Re-enable foreign key checks
         DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
};
