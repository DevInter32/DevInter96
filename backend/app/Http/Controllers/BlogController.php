<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entrada;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\EntradaRequest;
use App\Http\Requests\EntradaEditarRequest;

class BlogController extends Controller
{
    public function index(){



    	$entradas = Entrada::withCount(['comentarios' => function($query){
            $query->where('estado','=','aprobado');
        }])->with('users')->orderBy('entradas.id','desc')->paginate(5);




       /*$entradas = Entrada::join("comentarios", "comentarios.entrada_id", "=", "entradas.id")
            ->join('users','entradas.user_id','=','users.id')
            ->groupBy("entradas.id","users.name",'entradas.titulo','entradas.created_at','entradas.img_vista_previa')
            ->orderBy('entradas.id', 'desc')
            ->get([DB::raw('COUNT(comentarios.entrada_id) as total_comentario'),'entradas.id','users.name','entradas.titulo','entradas.created_at','entradas.img_vista_previa']);*/


        $data['entradas']=$entradas;


        /*$entradas_mas_vistas = Entrada::with('vistas_entrada')->orderBy(DB::raw('COUNT(entradas.id)','asc'))->groupBy('entradas.id','entradas.user_id','entradas.titulo','entradas.img_vista_completa','entradas.img_vista_previa','entradas.created_at','entradas.updated_at','entradas.descripcion')->get();*/




        
        $entradas_mas_vistas = Entrada::join("vistas_entradas", "vistas_entradas.entrada_id", "=", "entradas.id")
            ->join('users','entradas.user_id','=','users.id')
            ->where("vistas_entradas.created_at", ">=", date("Y-m-d H:i:s", strtotime('-43200 hours', time())))
            ->groupBy('entradas.id','entradas.user_id','entradas.titulo','entradas.img_vista_completa','entradas.img_vista_previa','entradas.created_at','entradas.updated_at','entradas.descripcion','entradas.tiempo_lectura')
            ->orderBy(DB::raw('COUNT(entradas.id)'), 'desc')//here its very minute mistake of a paranthesis in Jean Marcos' answer, which results ASC ordering instead of DESC so be careful with this line
            ->limit(5)
            ->get([DB::raw('COUNT(entradas.id) as total_vistas'),'entradas.id','users.name','entradas.titulo','entradas.created_at','entradas.img_vista_previa']);
        $data['entradas_mas_vistas']= $entradas_mas_vistas;
        

    	return $data;
    	//return view('blog.index',["posts" => $posts]);

    }

    public function test(Request $request){
        $data = [];


        //Handle File Upload
        if($request->hasFile('image')){

        //Get filename with the extension
        $filenamewithExt = $request->file('image')->getClientOriginalName();
        
        //Get just filename
        $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
        
        //Get just ext
        $extension = $request->file('image')->guessClientExtension();
        
        //FileName to store
        $fileNameToStore = time().'.'.$extension;
        
        //Upload Image
        $path = $request->file('image')->storeAs('public/img/imagenes_articulos',$fileNameToStore);


        $data["url"]=$fileNameToStore;
        
       
        } 



        return $data;
    }

    public function show($id){

    	$entrada = Entrada::join('users','entradas.user_id','=','users.id')->select('entradas.titulo','entradas.descripcion','entradas.img_vista_previa','entradas.img_vista_completa','entradas.created_at','users.nombre as autor','entradas.id','entradas.tiempo_lectura','users.imagen_perfil as imagen_autor')->where('entradas.id','=',$id)->first();

        \App\VistaEntrada::createViewLog($entrada);

    	return $entrada;

    }

    public function destroy($id){
        Entrada::destroy($id);
        return "exito";
    }

    public function update($id, EntradaEditarRequest $entrada_request){
        $post = Entrada::find($id);
        $post->titulo = request()->get('titulo');
        $post->descripcion = request()->get('descripcion');
        $post->tiempo_lectura = request()->get('tiempo_lectura');
        $post->user_id = Auth::id();

        //Handle File Upload
        if(request()->hasFile('file')){

        //Get filename with the extension
        $filenamewithExt = request()->file('file')->getClientOriginalName();
        
        //Get just filename
        $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
        
        //Get just ext
        $extension = request()->file('file')->guessClientExtension();
        
        //FileName to store
        $fileNameToStore = time().'.'.$extension;
        
        //Upload Image
        $path = request()->file('file')->storeAs('public/img/entradas',$fileNameToStore);


        $post->img_vista_previa=$fileNameToStore;
        
       
        } 
        if(request()->hasFile('file_completa')){

        //Get filename with the extension
        $filenamewithExt = request()->file('file_completa')->getClientOriginalName();
        
        //Get just filename
        $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
        
        //Get just ext
        $extension = request()->file('file_completa')->guessClientExtension();
        
        //FileName to store
        $fileNameToStore = time().'-completa.'.$extension;
        
        //Upload Image
        $path = request()->file('file_completa')->storeAs('public/img/entradas',$fileNameToStore);



        $post->img_vista_completa=$fileNameToStore; 
        
       
        } 

        $post->save();

        return "exito";

    }

    public function store(EntradaRequest $entrada_request){
        
        $post = new Entrada();
        $post->titulo = request()->get('titulo');
        $post->descripcion = request()->get('descripcion');
        $post->tiempo_lectura = request()->get('tiempo_lectura');
        $post->user_id = Auth::id();


        //Handle File Upload
        if(request()->hasFile('file')){

        //Get filename with the extension
        $filenamewithExt = request()->file('file')->getClientOriginalName();
        
        //Get just filename
        $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
        
        //Get just ext
        $extension = request()->file('file')->guessClientExtension();
        
        //FileName to store
        $fileNameToStore = time().'.'.$extension;
        
        //Upload Image
        $path = request()->file('file')->storeAs('public/img/entradas',$fileNameToStore);


        $post->img_vista_previa=$fileNameToStore;
        
       
        } 
        if(request()->hasFile('file_completa')){

        //Get filename with the extension
        $filenamewithExt = request()->file('file_completa')->getClientOriginalName();
        
        //Get just filename
        $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
        
        //Get just ext
        $extension = request()->file('file_completa')->guessClientExtension();
        
        //FileName to store
        $fileNameToStore = time().'-completa.'.$extension;
        
        //Upload Image
        $path = request()->file('file_completa')->storeAs('public/img/entradas',$fileNameToStore);



        $post->img_vista_completa=$fileNameToStore; 
        
       
        } 

        $post->save();

        return "exito";

    }
}