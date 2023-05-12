<?php

namespace App\Models\mdd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;

    protected $table = 'payments';
    protected $fillable = [
        'payid',
        'clientid',
        'propertyid',
        'amount',
        'currency',
        'casherid',
        'term_months_pay',
        'term_interest',
        'misc_interest',
        'misc_u_turnover',
        'discount_f_paid',
        'stransdate'
    ];
}
