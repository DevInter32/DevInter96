<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VistaEntrada extends Model
{
	protected $table="vistas_entradas";

    public static function createViewLog($post) {
        $postViews= new VistaEntrada();
        $postViews->entrada_id = $post->id;
        $postViews->url = \Request::url();
        $postViews->session_id = \Request::getSession()->getId();
        $postViews->user_id = (\Auth::check())?\Auth::id():null; //this check will either put the user id or null, no need to use \Auth()->user()->id as we have an inbuild function to get auth id
        $postViews->ip = \Request::getClientIp();
        $postViews->agent = \Request::header('User-Agent');
        $postViews->save();//please note to save it at lease, very important
    }
}
