<?php

namespace App\Models\mdd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class auditing extends Model
{
    use HasFactory;

    protected $table = 'auditings';
    protected $fillable = [
        'id',
        'aud_name',
        'aud_action',
        'aud_old_value',
        'aud_new_value',
        'aud_user_id',
        'aud_ip',
        'aud_agent'
    ];
}
