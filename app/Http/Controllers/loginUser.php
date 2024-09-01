<?php

namespace App\Http\Controllers;

use App\Events\Usuariologeado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cookie;


class loginUser extends Controller{

    public function loginUserAcces(Request $request) {
        $credentials = $request->only(['email', 'password']);
        if ( Auth::attempt( $credentials, false ) ) {
            $request->session()->regenerate();
            return json_encode([
                'mensaje' => 'success login',
                'request' => true,
            ]);
        }else {
            return json_encode([
                'mensaje' => 'password o mail incorrectos',
                'request' => false,
            ]);
        }
    }
    public function logout(Request $request){
        Auth::logout();
        session()->flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return 'Sesion cerrada';
    }
    public function usuarioactivo(Request $request):Int{
        if (Auth::check()) {
           return  1;
        } else {
            return 0;
        }
    }
    public function token_activo ():void{
        Auth::check();
    }
    public function InformacionUsuario():String{
        return json_encode(Auth::user());
    }
    
}
