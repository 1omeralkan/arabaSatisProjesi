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

    protected static function booted()
    {
        static::addGlobalScope('toyota_filter', function ($query) {
            // Kullanıcı giriş yaptıysa ve role'si 0 ise (Toyota Yetkilisi)
            if (auth()->check() && auth()->user()->role == 0) {
                $query->whereHas('model.carBrand', function ($q) {
                    $q->where('name', 'Toyota');
                });
            }
        });
    }

    public function scopePublished($query)
    {
        return $query->where('status', 1);
    }
    public function logs()
    {
        return $this->hasMany(CarLog::class);
    }



}
