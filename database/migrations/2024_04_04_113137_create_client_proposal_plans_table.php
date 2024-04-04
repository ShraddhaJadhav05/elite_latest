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
        Schema::create('client_proposal_plans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('client_id')->unsigned()->nullable();

            $table->enum('status', ['active', 'deactive'])->default('deactive');

            $table->string('client_interest')->nullable();
            $table->foreign('client_id')->references('id')->on('clients');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_proposal_plans');
    }
};
