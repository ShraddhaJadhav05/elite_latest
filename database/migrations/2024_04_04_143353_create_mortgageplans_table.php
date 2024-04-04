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
        Schema::create('mortgageplans', function (Blueprint $table) {
            $table->id();
            $table->string('mortgage_plan_id')->nullable();
            $table->string('plan_name')->nullable();

            $table->bigInteger('branch_id')->unsigned()->nullable();
            $table->bigInteger('bank_id')->unsigned()->nullable();
            $table->bigInteger('product_id')->unsigned()->nullable();

            $table->foreign('product_id')->references('id')->on('bank_products');
            $table->foreign('bank_id')->references('id')->on('banks');
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mortgageplans');
    }
};
