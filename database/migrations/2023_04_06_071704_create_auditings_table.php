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
        Schema::create('auditings', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('aud_name',30);
            $table->string('aud_action',30);
            $table->string('aud_old_value',500);
            $table->string('aud_new_value',500);
            $table->integer('aud_user_id');
            $table->ipAddress('aud_ip');
            $table->string('aud_agent',30);
            $table->timestamps();

            $table->index(['aud_user_id', 'aud_action', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auditings');
    }
};
