<?php

namespace App\Models\mdd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class locationBaragay extends Model
{
    use HasFactory;

    protected $table = 'location_baragays';
    protected $fillable = ['province','city','barangay','status'];
}
