<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarBrand extends Model
{
    use HasFactory, softDeletes;
    protected $table = 'car_brands';
    public function carModels (){
        return $this->hasMany(CarModel::class, 'brand_id','id');
    }
}
