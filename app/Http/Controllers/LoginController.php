<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){

        return view('login');
    }

    public function login(Request $request)
    {
        try{
            $mail = $request->get('mail');
            $pass = $request->get('pass');

            $usuario = Usuario::where('mail', '=', $mail)->where('pass', '=', md5($pass))->first();

            if($usuario != null){

                Session::put('usuario', $usuario);

                return 1;
            }
            else{

                return "Las credenciales de ingreso no son correctas";
            }
        }
        catch(Exception $ex){
            return $ex->getMessage();
        }
    }

    public function logout(){
        
        Session::flush();
        return redirect()->route('/');
    }
}
