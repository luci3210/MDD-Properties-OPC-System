<?php

namespace App\Models\mdd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterModel extends Model
{
    use HasFactory;

    protected $table = 'register_models';
    protected $fillable = ['name','department','email','password','status'];
}
