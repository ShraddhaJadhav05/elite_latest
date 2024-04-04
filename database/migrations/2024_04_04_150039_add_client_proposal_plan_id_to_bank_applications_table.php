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


            $table->bigInteger('client_proposal_plan_id')->unsigned()->nullable();


            $table->foreign('client_proposal_plan_id')->references('id')->on('client_proposal_plans');
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
