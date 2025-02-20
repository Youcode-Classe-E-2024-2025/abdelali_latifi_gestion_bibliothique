<?php

namespace App\Http\Controllers;

use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function login(Request $request){

    $email = $request->email ;
    $password = $request->password ;
    $credentails = ['email' => $email , 'password' => $password];

    if(Auth::attempt($credentails)){

        $request->session()->regenerate();
        return to_route('login')->with('Success', 'vous étes bien connecté');
    }else{

        return back()->withErrors([
        'login'=>'email or password incorrect'
        ])->onlyInput(('login'));
    }
    }
}
