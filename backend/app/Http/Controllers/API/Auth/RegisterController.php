<?php

namespace App\Http\Controllers\api\Auth;


use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    public $loginAfterSignUp = true;
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    // Esta función permite registrar un nuevo usuario, con validación lado servidor
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'nombre'=>'required|string|max:100|',
            'email'=>'required|email|max:255|unique:users',
            'password'=>'required|string|min:8|max:255|confirmed',
            'password_confirmation'=> 'required|string|min:8|max:255'
        ]);

        //Si hay algún error de lado del cliente, se envía mensaje de error
        if ($validator->fails()){
            return response()->json([
                'status'=>'error',
                'messages'=>$validator->messages()
            ],401);
        }

        // Si petición es correcta, se crea nuevo usuario
        $user = new User();
        $user->nombre = $request->nombre;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $user->sendApiEmailVerificationNotification();
        //$user->sendEmailVerificationNotification();

        //Por defecto, al registrarse cada usuario tiene privilegios limitados
        $user->roles()->attach(Role::where('nombre', 'Usuario')->first());

        //Se envía correo electrónico al nuevo usuario para confirmar registro
        $success['message'] = 'Necesitamos validar tu usuario, te enviamos un correo electrónico con instrucciones para aquello.';
        return response()->json([
            'success'   =>  $success,
        ], 200);
    }
}
