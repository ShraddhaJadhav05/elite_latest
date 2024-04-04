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
        Schema::create('final_bank_applications', function (Blueprint $table) {

            $table->id();
            $table->string('application_number')->nullable();
            $table->string('application_date')->nullable();
            $table->string('bank_feedback')->nullable();

            $table->bigInteger('staff_id')->unsigned()->nullable();
            $table->bigInteger('client_id')->unsigned()->nullable();
             $table->bigInteger('client_proposal_plan_id')->unsigned()->nullable();

            $table->foreign('staff_id')->references('id')->on('staff');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('client_proposal_plan_id')->references('id')->on('clients');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('final_bank_applications');
    }
};
