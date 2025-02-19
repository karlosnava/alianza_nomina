<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use App\Models\City;

class Country extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function users() { // 1:N
        return $this->hasMany(User::class)->orderBy('first_name');
    }

    public function cities() { // 1:N
        return $this->hasMany(City::class);
    }
}
