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
        Schema::create('costings', function (Blueprint $table) {
            $table->id();
            $table->string('consting_title',50);
            $table->integer('term_interest');
            $table->integer('miscellaneous_interest');
            $table->integer('miscellaneou_u_t_over');
            $table->integer('discount_f_paid');
            $table->integer('agent_commission');
            $table->integer('no_month_commission');
            $table->integer('expanded_htax');
            $table->string('remarks');
            $table->integer('status');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('costings');
    }
};
