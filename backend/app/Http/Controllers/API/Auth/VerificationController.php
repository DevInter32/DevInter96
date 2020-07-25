<?php

namespace App\Http\Controllers\api\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Response;
use Illuminate\Auth\Access\AuthorizationException;

class VerificationController extends Controller
{
    use VerifiesEmails;
    
    //Se muestra el aviso de verificación por correo
    
    public function show()
    {
        //
    }
    
    //Se marca la dirección de email del usuario autenticado como verificado
    
    public function verify(Request $request)
    {

        //auth()->loginUsingId($request->route('id'));

        $userID = $request['id'];
        $user = User::findOrFail($userID);
        $date = date("Y-m-d g:i:s");
        $user->email_verified_at = $date;
        $user->save();
        return response()->json('Email verificado');

        /* if (! hash_equals((string) $request->route('id'), (string) $request->user()->getKey())) {
            throw new AuthorizationException;
        }

        if (! hash_equals((string) $request->route('hash'), sha1($request->user()->getEmailForVerification()))) {
            throw new AuthorizationException;
        }

        if ($request->user()->hasVerifiedEmail()) {
            //return redirect($this->redirectPath());
            return response(['mensaje'=>'Ya verificado']);
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        //return redirect($this->redirectPath())->with('verified', true);
        return response(['mensaje' => 'Verificado exitosamente']); */
    }
    
    //Se envia nuevamente la notificación de verificación de email
    
    public function resend(Request $request) {
        //parent::resend($request);
        if ($request->user()->hasVerifiedEmail()){
            return response()->json('Usuario ya ha verificado email!', 422);
            // return redirect($this->redirectPath());
        }
        
        $request->user()->sendEmailVerificationNotification();
        
        return response()->json('Se ha reenviado la notificación');
        // return back()->with(‘resent’, true);
    }
    
    public function __construct() {
        /* $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6.1')->only('verify', 'resend'); */
        $this->middleware('auth:api')->only('resend');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6.1')->only('verify', 'resend');
    }
}
