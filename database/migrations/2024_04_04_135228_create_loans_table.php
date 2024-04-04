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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('application_number');
            $table->string('loan_praposals_id');
            $table->string('loan_plan_name');
            $table->string('bank_applied');
            $table->string('bank_branch');
            $table->string('bank_product');
            $table->string('tenure');
            $table->string('interest_rate');
            $table->string('upfront_down_payment');
            $table->string('monthly_instalment');
            $table->string('application_date');
            $table->string('application_status');
            $table->string('bank_feedback');


            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('staff_id');
            $table->unsignedBigInteger('bank_id');
            $table->unsignedBigInteger('bank_products_id');
            $table->unsignedBigInteger('client_documents_id');
            $table->unsignedBigInteger('bank_applications_id');

            $table->foreign('bank_applications_id')->references('id')->on('bank_applications');


            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('staff_id')->references('id')->on('staff');
            $table->foreign('bank_id')->references('id')->on('banks');
            $table->foreign('bank_products_id')->references('id')->on('bank_products');
            $table->foreign('client_documents_id')->references('id')->on('client_documents');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
