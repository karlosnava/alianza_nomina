<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Position;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $hidden  = ['password', 'remember_token'];
    protected $casts   = ['email_verified_at' => 'datetime'];

    // Relations
    public function positions() { // N:N
        return $this->belongsToMany(Position::class);
    }
    
    public function document_type() { // 1:N
        return $this->belongsTo(DocumentType::class);
    }
    
    public function country() { // 1:N
        return $this->belongsTo(Country::class);
    }
    
    public function city() { // 1:N
        return $this->belongsTo(City::class);
    }
    
    public function boss() { // 1:1
        return $this->belongsTo(User::class, 'boss_id');
    }
}
