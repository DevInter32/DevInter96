<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Defuse\Crypto\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id_usuario = Auth::user()->id;
        return $usuario = User::find($id_usuario);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function perfil(Request $request)
    {
        $user = Auth::user();
        return response()->json([
            'success' => $user
        ], 200);
    }

    /* public function obtener_imagen(Request $request){
        $user = User::find(auth()->user()->id);
        //$image_user = User::find(auth()->user()->;
        return response()->json(([
            'imagen' => $user->imagen_perfil
        ]));
    } */


    
    // Función para subir imagenes en la API como avatares de usuario
    public function cambiar_imagen(Request $request){

        //Se obtiene el id del usuario para cambio de imagen
        $user = User::find(auth()->user()->id);

        //Si hay algún error se detiene el proceso
        if(!$request->hasFile('imagen_avatar')){
            return response()->json([
                'error' => 'No se puede cargar imagen'
            ], 400);
        }

        // Se obtiene los datos del avatar a subir: nombre y extensión.
        $email_avatar = $user->email;
        $imagen_avatar = $request->file('imagen_avatar');
        $extension_avatar = $request->file('imagen_avatar')->extension();

        // Se crea variable para ser usado como nombre de avatar en database
        $nombre_avatar = $email_avatar .'.'. $extension_avatar;
        if(!$imagen_avatar->isValid()){
            return response()->json(['Carga de archivo inválido'], 400);
        }

        //Se guarda imagen en ruta y nombre en database
        $ruta_destino = base_path() . '/public/img/usuarios';
        $imagen_avatar->move($ruta_destino, $nombre_avatar);
        $user->imagen_perfil = $nombre_avatar;

        $user->save();
        
        return response()->json(compact('ruta_destino'));
            
    }

    //Función para cambiar las claves del usuario en la API
    public function cambiar_clave(Request $request){
        $user = User::find(auth()->user()->id);
        $current_password = $request->password; //Password actual que ingresa el usuario
        $new_password = $request->password_new; //Password nuevo que ingresa el usuario
        $password_confirmation = $request->password_confirmation; //Password nuevo confirmado por el usuario
        $current_db_password = $user->password; //Password actual registrado en la base de datos

        //Se comprueba que las passwords nuevas coincidan, password a cambiar no sea la actual
        //y que no quede ningún campo pendiente
        if (($current_password) && ($new_password) && ($password_confirmation)&&(!Hash::check($new_password,$current_db_password))&&($new_password === $password_confirmation)&&(Hash::check($current_password, $current_db_password))){
            $user->password = Hash::make($new_password);
            $user->save();
            return response()->json([
                'mensaje' => 'Password cambiada exitosamente'
            ], 200);
        }
        else{
            return response()->json([
                'mensaje' => 'Error, no se pudo cambiar password'
            ], 409);
        }
    }  
}
