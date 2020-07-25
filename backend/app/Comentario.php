<?php

namespace App;
use App\User;
use App\Entrada;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table ="comentarios";

    protected $fillable = ["user_id","entrada_id","comentario","estado"];

    protected $with = ["user"];

    protected $casts = [
    	'created_at' => 'datetime:d-M-Y',
    ];

	public function getCustomRatingAttribute (){
		return $this->created_at;//->format('d/m/Y');
	}

	public function user () {
		return $this->belongsTo(User::class,'user_id','id'); //este sirve
	}

	public function entrada(){
		return $this->belongsTo(Entrada::class,'entrada_id');
	}


    
}
