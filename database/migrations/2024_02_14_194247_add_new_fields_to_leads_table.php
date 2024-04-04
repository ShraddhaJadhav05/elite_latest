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
        Schema::table('leads', function (Blueprint $table) {
            $table->string('nationality')->nullable();
            $table->string('residence_country')->nullable();
            $table->string('company')->nullable();
            $table->string('monthly_salary')->nullable();
            $table->string('office_address')->nullable();
            $table->string('office_phone_number')->nullable();
            $table->string('loan_looking_for')->nullable();
            $table->string('loan_amount_required')->nullable();
            $table->string('property_price')->nullable();
            $table->string('down_payment')->nullable();
            $table->string('years')->nullable();
            $table->string('interest_rate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            //
        });
    }
};
