<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //

    public function logout() {
        
        return view('menageres.index');
    }

    public function login(){

        return view('auth.login');
    }


}
