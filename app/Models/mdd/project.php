<?php

namespace App\Models\mdd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;

    protected $table = 'projects';
    protected $fillable = ['name','province','city','barangay','longitude','latitude','area','skitch_img','address','status'];
}
