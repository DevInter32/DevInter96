<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\VueTables\EloquentVueTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;

class UsuariosController extends Controller
{

    public function perfil(){
        $id_usuario = auth()->user()->id;
        return $usuario = User::find($id_usuario);


    }

    public function cambiar_imagen(Request $request){
        $usuario = User::find(auth()->user()->id);

        if($request->hasFile('file')){
            if($usuario->imagen_perfil != null){
                Storage::delete('public/img/usuarios/'.$usuario->imagen_perfil);
            }

        //Get filename with the extension
          $filenamewithExt = $request->file('file')->getClientOriginalName();
          
          //Get just filename
          $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
          
          //Get just ext
          $extension = $request->file('file')->guessClientExtension();
          
          //FileName to store
          $fileNameToStore = time().'.'.$extension;
          
          //Upload Image
          $path = $request->file('file')->storeAs('public/img/usuarios',$fileNameToStore);
        }

        $usuario->imagen_perfil = $fileNameToStore;
        $usuario->save();

        return "exito";
    }

    public function cambiar_clave(Request $request){
        $usuario = User::find(auth()->user()->id);
        $contra_encriptada= $request->clave;
        $data = [];
        if(Hash::check($contra_encriptada,$usuario->password)){
            $usuario->password= Hash::make($request->nueva_clave);
            $usuario->save();

            $data['mensaje'] = 'exito';

        }else{
            $data['mensaje'] = "las claves no son iguales";
        }

        return $data;

    }

    public function update(Request $request){
        //esta funcion esta enlazado con el cambio de credenciales
    	$contra_encriptada= $request->clave;

    	$usuario = User::find(Auth::id());

    	if(Hash::check($contra_encriptada,$usuario->password)){
    		//Aqui se cambia las credenciales, una vez las contraseñas sean iguales
            $usuario->password= Hash::make($request->nueva_clave);
            $usuario->name= $request->usuario;
            $usuario->save();
            return dd("se ha configurado el usuario");
    	}

	}

    public function actualizar_rol($id, Request $request){
        $user = User::find($id);
        $user->role_id = $request->role;
        $user->save();

        return "exito";

    }

    public function table(){
        $vueTables = new EloquentVueTables;
        $data = $vueTables->get(new User,['id','name','role_id','created_at']);
        return response()->json($data);

    }

    public function cargar_roles(){
        return Role::all();
    }	

    public function store(Request $request){

        

        $this->validator($request->all())->validate();

        $user = $this->create($request->all());
        /*$user->email_verified_at = (new \DateTime())->format('Y-m-d H:i:s');
        dd($user->email_verified_at);*/
        $user->markEmailAsVerified();
        //$this->registered($request, $user);;



        return response()->json(['success'=>'Done!']);
    }

    public function validator(array $data){
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required']
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => $data['role']
        ]);
    }

    protected function registered(Request $request, $user)
    {
        //
    }

    public function index(){
        
    }

}
