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
        Schema::create('bank_products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->string('plan')->nullable();
            $table->string('interest_rate')->nullable();
            $table->string('available_date')->nullable();
            $table->string('tenure')->nullable();
            $table->string('processing_fee')->nullable();
            $table->string('monthly_installment')->nullable();
            $table->foreign('bank_id')->references('id')->on('banks');
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_products');
    }
};
