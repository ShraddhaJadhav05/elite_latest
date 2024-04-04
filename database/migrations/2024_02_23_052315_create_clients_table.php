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
        Schema::create('clients', function (Blueprint $table) {
            $table->softDeletes();
            $table->id();
            $table->unsignedBigInteger('lead_id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('gender')->nullable();
            $table->string('phone_number')->nullable();
            $table->text('address_line1')->nullable();
            $table->text('address_line2')->nullable();
            $table->string('city')->nullable();
            $table->string('region')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('country')->nullable();
            $table->string('reference_id')->nullable();
            $table->string('security_number')->nullable();
            $table->string('employment')->nullable();
            $table->string('loan_amount_offered')->nullable();
            $table->string('annual_gross_income')->nullable();
            $table->string('reason_for_loan')->nullable();
            $table->string('rent_homeowner')->nullable();
            $table->string('password')->nullable();
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
            $table->string('emirates')->nullable();
            $table->string('lead_type')->nullable();

            $table->timestamps();
            
            $table->foreign('lead_id')->references('id')->on('leads')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
        Schema::table('clients', function (Blueprint $table) {
            $table->dropSoftDeletes();

        });
    }
};
