<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarDamage extends Model
{
    use HasFactory ;

    protected $table = 'car_damages';
    public function cars(){
        return $this->hasMany(Car::class,'damage_id','id');
    }
}
