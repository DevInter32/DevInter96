<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $mensaje= "sin mensaje";
        if($request->session()->get('login') != null){
            $mensaje = $request->session()->get('login');
            $request->session()->forget('login');
        }

        //$request->user()->authorizeRoles(['user', 'admin']);





        return view('home',compact('mensaje'));

        //return view('home');
    }
}
