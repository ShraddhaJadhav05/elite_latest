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
        Schema::create('client_documents', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('staff_id')->nullable();

            $table->string('document_name')->nullable();
            $table->string('filename')->nullable();
            $table->string('file_path')->nullable();
            $table->boolean('shown_to_agent')->default(false);
            $table->string('encrypted_file_path')->nullable();
            $table->string('document_type')->nullable();
            $table->enum('document_status',['pending','rejected','varified'])->default('pending');
            $table->string('status')->nullable();
            $table->boolean('is_loan_document')->default(false);
            $table->foreign('staff_id')->references('id')->on('staff');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_documents');
    }
};
