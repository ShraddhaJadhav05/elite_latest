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
        Schema::create('bankbranches', function (Blueprint $table) {
            $table->id();
     

            $table->unsignedBigInteger('bank_id');
            $table->unsignedBigInteger('branch_id');

          

   
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('emirate')->nullable();
            $table->string('country')->nullable();
            $table->string('contact')->nullable();
            $table->string('description')->nullable();
   
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
        Schema::dropIfExists('bankbranches');
    }
};
