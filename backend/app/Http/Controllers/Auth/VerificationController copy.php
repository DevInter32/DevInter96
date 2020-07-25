<?php

namespace App\Http\Controllers\api\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Events\Verified;

class VerificationController extends Controller
{
    use VerifiesEmails;
    
    //Se muestra el aviso de verificación por correo
    
    public function show()
    {
        //
    }
    
    //Se marca la dirección de email del usuario autenticado como verificado
    
    public function verify(Request $request) {
        //parent::verify($request);
        $userID = $request['id'];
        $user = User::findOrFail($userID);
        $date = date("Y-m-d g:i:s");
        $user->email_verified_at = $date;
        $user->save();
        return response()->json('Email verificado');
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
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6.1')->only('verify', 'resend');
    }
}
