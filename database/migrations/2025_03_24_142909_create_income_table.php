<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('income', function (Blueprint $table) {
            $table->id();
            $table->string('source'); // Tithe, Offering, Donation, etc.
            $table->decimal('amount', 15, 2);
            $table->date('date_received');
            $table->string('payment_method'); // Cash, Bank Transfer, Card, etc.
            $table->string('donor')->nullable(); // Name of giver (optional)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('income');
    }
};
