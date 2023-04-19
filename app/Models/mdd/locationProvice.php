<?php

namespace App\Models\mdd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class locationProvice extends Model
{
    use HasFactory;

    protected $table = 'location_provices';
    protected $fillable = ['province','status'];
}
