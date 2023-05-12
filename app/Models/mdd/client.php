<?php

namespace App\Models\mdd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    use HasFactory;

    protected $table = 'clients';
    protected $fillable = ['id',
            'user_id',
            'fname',
            'lname',
            'mname',
            'ifmarried',
            'address',
            'province',
            'city',
            'barangay',
            'bdate',
            'age',
            'bplace',
            'religion',
            'nationality',
            'cstatus'
        ];
}
