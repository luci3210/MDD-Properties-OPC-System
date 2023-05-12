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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer('payid');
            $table->integer('clientid');
            $table->integer('propertyid');
            $table->decimal('amount',8,2);
            $table->string('currency');
            $table->integer('casherid');
            $table->integer('term_months_pay');
            $table->float('term_interest');
            $table->float('misc_interest');
            $table->float('misc_u_turnover');
            $table->float('discount_f_paid');
            $table->float('tax');
            $table->date('stransdate');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
