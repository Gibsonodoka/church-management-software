<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $table = 'incomes'; // Explicitly set table name
    protected $fillable = ['source', 'amount', 'date_received', 'payment_method', 'donor'];
}