<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class authController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function registre(){
        return view('registre');
    }

    public function home(){
        return view('home');
    }
}
