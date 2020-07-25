<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Role extends Model
{
    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
