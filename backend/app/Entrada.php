<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comentario;
use App\VistaEntrada;
class Entrada extends Model
{
    //
    protected $table = "entradas";

    protected $withCount = ['comentarios'];

    

    protected $fillable=["titulo","descripcion","autor","img_vista_previa","fecha",'user_id'];
    protected $casts = [
    	'created_at' => 'datetime:d-M-Y',
    ];
    public function users(){
    	return $this->belongsTo('App\User','user_id','id');
    }

    public function comentarios(){
    	return $this->hasMany(Comentario::class)->select('id','user_id');
    }

    public function vistas_entrada(){
        return $this->hasMany(VistaEntrada::class)->select('id','user_id');
    }
}
