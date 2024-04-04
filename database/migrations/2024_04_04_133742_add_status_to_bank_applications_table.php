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
            // $table->unsignedBigInteger('loan_id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('staff_id');
            $table->unsignedBigInteger('bank_id');
            $table->unsignedBigInteger('bank_products_id');
            $table->unsignedBigInteger('client_documents_id');


            // $table->foreign('loan_id')->references('id')->on('loans');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('staff_id')->references('id')->on('staff');
            $table->foreign('bank_id')->references('id')->on('banks');
            $table->foreign('bank_products_id')->references('id')->on('bank_products');
            $table->foreign('client_documents_id')->references('id')->on('client_documents');
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
