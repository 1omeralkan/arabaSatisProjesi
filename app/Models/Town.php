<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Town extends Model
{
    use HasFactory , softDeletes;
    protected $table = 'towns';
    public function getCity(){
        return $this->belongsTo(City::class, 'city_id','id');
    }
}
