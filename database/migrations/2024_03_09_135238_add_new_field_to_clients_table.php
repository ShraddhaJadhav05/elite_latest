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
        Schema::table('clients', function (Blueprint $table) {
            $table->boolean('enable_sms_notification')->default(false);
            $table->boolean('when_to_mail_notification')->default(false);
            $table->boolean('when_to_mail_direct_message')->default(false);
            $table->boolean('when_to_mail_connection')->default(false);
            $table->boolean('when_to_escalate_order')->default(false);
            $table->boolean('when_to_escalate_membership_approval')->default(false);
            $table->boolean('when_to_escalate_member_registration')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clients', function (Blueprint $table) {
            //
        });
    }
};
