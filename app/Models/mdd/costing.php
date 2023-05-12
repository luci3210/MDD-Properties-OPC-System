<?php

namespace App\Models\mdd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class costing extends Model
{
    use HasFactory;

    protected $table = 'costings';
    protected $fillable = [
            'consting_title',
            'nomonths_term',
            'term_interest',
            'miscellaneous_interest',
            'miscellaneou_u_t_over',
            'discount_f_paid',
            'agent_commission',
            'no_month_commission',
            'expanded_htax',
            'remarks',
            'status',
            'user_id'
        ];
}
