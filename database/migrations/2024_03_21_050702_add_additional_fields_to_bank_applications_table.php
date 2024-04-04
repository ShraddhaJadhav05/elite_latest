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
        Schema::table('bank_applications', function (Blueprint $table) {
            $table->string('loan_number')->nullable();
            $table->string('applicant_name')->nullable();
            $table->string('applicant_mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('residence_country')->nullable();
            $table->string('nationality')->nullable();
            $table->string('property')->nullable();
            $table->string('staff_name')->nullable();
            $table->string('document_id')->nullable();
            $table->string('bank_applied')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('bank_product')->nullable();
            $table->string('tenure')->nullable();
            $table->string('interest_rate')->nullable();
            $table->string('upfront_down_payment')->nullable();
            $table->string('monthly_instalment')->nullable();

 
            $table->enum('application_status1', ['Pending', 'In_Progress', 'On_Hold', 'Rejected', 'Approved'])->nullable();
  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bank_applications', function (Blueprint $table) {
            //
        });
    }
};
