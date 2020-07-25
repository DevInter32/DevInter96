<?php

namespace App\Http\Controllers\API;

use JWTAuth;
use App\Role;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
//use App\Http\Requests\FormRegistroRequest;
use App\Http\Controllers\Controller;
use App\User;
//use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\FormRegistroRequest;

class AuthController extends Controller
{
    
    
    
    protected function credentials(Request $request)
    {
        return $request->only('email');
    }


    public function callResetPassword(Request $request)
    {
        return $this->reset($request);
    }

    public function reset(Request $request)
    {
        $request->validate($this->rules(), $this->validationErrorMessages());

        $request->session()->put('login','restauracion_clave');

        session()->save();

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $response = $this->broker()->reset(
            $this->credentials_reset($request), function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        return $response == Password::PASSWORD_RESET
                    ? $this->sendResetResponse($request, $response)
                    : $this->sendResetFailedResponse($request, $response);

    }

    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ];
    }



    protected function validationErrorMessages()
    {
        return [];
    }


    protected function credentials_reset(Request $request)
    {
        return $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );
    }

    


	protected function sendResetResponse(Request $request, $response)
	{
	    //return response()->json(['message' => 'Password reset successfully.']);
            return $this->response->array(['message'=>'Contraseña cambiada exitosamente']);
	}
	/**
	 * Get the response for a failed password reset.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  string  $response
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
	 */
	protected function sendResetFailedResponse(Request $request, $response)
	{
	    //return response()->json(['message' => 'Failed, Invalid Token.']);
            return $this->response->errorUnauthorized('Error. Token inválido');
	}


	public function show_reset(){
		$mensaje='';
		return view('home',compact('mensaje'));
    }

}
