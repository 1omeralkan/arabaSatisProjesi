<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory,softDeletes;
    protected $table = 'cities';

    public function getTowns(){
        return $this->hasMany(Town::class, 'city_id','id');
    }
}
