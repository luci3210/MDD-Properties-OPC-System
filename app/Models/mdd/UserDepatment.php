<?php

namespace App\Models\mdd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDepatment extends Model
{
    use HasFactory;

    protected $table = 'user_depatments';
    protected $fillable = ['user_id','user_department_id','atatus'];
}
