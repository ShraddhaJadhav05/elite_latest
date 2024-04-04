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
      
            $table->string('application_number')->nullable()->change();
            $table->string('application_date')->nullable()->change();
            $table->string('application_status')->nullable()->change();
            $table->string('bank_feedback')->nullable()->change();


            $table->unsignedBigInteger('loan_id')->nullable()->change();
            $table->unsignedBigInteger('client_id')->nullable()->change();
            $table->unsignedBigInteger('staff_id')->nullable()->change();
            $table->unsignedBigInteger('bank_id')->nullable()->change();
            $table->unsignedBigInteger('bank_products_id')->nullable()->change();
            $table->unsignedBigInteger('client_documents_id')->nullable()->change();
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
