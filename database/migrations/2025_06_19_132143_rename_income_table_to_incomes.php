<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameIncomeTableToIncomes extends Migration
{
    public function up()
    {
        Schema::rename('income', 'incomes');
    }

    public function down()
    {
        Schema::rename('incomes', 'income');
    }
}