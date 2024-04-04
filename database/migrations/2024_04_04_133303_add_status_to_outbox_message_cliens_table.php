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
        Schema::table('outbox_message_cliens', function (Blueprint $table) {
            $table->bigInteger('outbox_message_id')->unsigned()->nullable();
            $table->foreign('outbox_message_id')->references('id')->on('outbox_message_cliens');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('outbox_message_cliens', function (Blueprint $table) {
            //
        });
    }
};
