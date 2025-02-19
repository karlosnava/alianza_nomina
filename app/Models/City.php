<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    function country() { // 1:N
        return $this->belongsTo(Country::class);
    }
    
    public function users() {
        return $this->hasMany(User::class);
    }
}
