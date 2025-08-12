<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarLog extends Model
{
    protected $fillable = ['car_id', 'user_id', 'action'];

    // Log kaydının ait olduğu ilan
    public function car()
    {
        return $this->belongsTo(Car::class)->withTrashed();
    }

    // Log kaydını oluşturan kullanıcı
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
