<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function registro(Request $request){
        $user = new User();
        
        $user->name = $request->nombre;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        Auth::login($user);

        return redirect(route('contactos.inicio'));
        
    }

    public function login(Request $request) {
        $credentials = [
            "email" => $request->email,
            "password" => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('contactos.inicio'));
        }else{
            return redirect(url('/'))->with('danger', 'Credenciales invalidas!');
        }
    }


    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(url('/'));
    }
}
