<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory,softDeletes;
    protected $table = 'cars';
    public function user() { return $this->belongsTo(User::class, 'user_id'); }
    public function model() { return $this->belongsTo(CarModel::class, 'model_id'); }
    public function damage() { return $this->belongsTo(CarDamage::class, 'damage_id'); }
    public function town() { return $this->belongsTo(Town::class, 'city_id'); }
    public function media() { return $this->hasMany(MediaGallery::class, 'car_id'); }

}
