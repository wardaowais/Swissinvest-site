<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    use HasFactory;

    protected $table = 'payment_history';

    protected $fillable = [
        'user_id',
        'payment_id',
        'wallet_name',
        'amount',
        'currency',
        'status',
        'payment_details',
    ];
}