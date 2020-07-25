<?php

namespace App\Http\Controllers\Api\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * @var bool
     */
    use VerifiesEmails;
    public $loginAfterSignUp = true;
    public $successStatus = 200;


    // Esta función permite a un usuario iniciar sesión en el sistema
    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:1|max:255'
        ]);
        
        // Si hay algún error de validación en el cliente, se genera error
        if ($validator->fails()){
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()
            ],401);
        }

        //Si los datos de usuario son incorrectos, se genera error de ingreso
        if (!$token = Auth::guard('api')->attempt(['email'=> $request->email,'password'=>$request->password])){
            return response()->json(['error'=>'No está autorizado a ingresar'], 401);
        }

        //Se comprueba si usuario ya validó en su correo electrónico
        $user = Auth::user();
        if($user->email_verified_at!==NULL){
            //Si el ingreso es correcto, se genera token
            return $this->respondWithToken($token);
        }
        else {
            return response()->json(['error'=>'Por favor revise su correo electrónico'], 401);
        }

        
        
    }

    public function user(){
        return response()->json(Auth::guard('api')->user());
    }

    ///Función permite crear un nuevo token en caso que el token anterior esté caducado
    public function refresh(){
        return $this->respondWithToken(Auth::guard('api')->refresh());
    }

    //Función permite al usuario cerrar sesión en el sistema
    public function logout(){
        Auth::guard('api')->logout();

        return response()->json([
            'status' => 'success',
            'message' => 'Sesión cerrada exitosamente'
        ], 200);
    }
    
    //Se genera token con tiempo de caducidad y se envía al navegador
    protected function respondWithToken($token){
        
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::guard('api')->factory()->getTTL() * 60
        ]);
    }
}
