<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('category'); // Salaries, Maintenance, Charity, etc.
            $table->decimal('amount', 15, 2);
            $table->date('date_paid');
            $table->string('payment_method'); // Cash, Bank Transfer, Mobile Payment
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('expenses');
    }
};
