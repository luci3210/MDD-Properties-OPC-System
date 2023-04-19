<?php

namespace App\Models\mdd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class locationCity extends Model
{
    use HasFactory;

    protected $table = 'location_cities';
    protected $fillable = ['province','city','status'];
}
