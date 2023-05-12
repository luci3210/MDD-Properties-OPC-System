<?php

namespace App\Models\mdd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class properties extends Model
{
    use HasFactory;

    protected $fillable = ['block','lot','lot_area','price','prime','corner_end','inner','site_id','term','group_id'];
    protected $table = 'properties';
}
