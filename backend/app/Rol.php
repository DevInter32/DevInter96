<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{


	protected $table= "roles";
    const ADMIN = 1;
    const USER = 2;

    
}
