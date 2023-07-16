<?php 

namespace App\Http\Controllers;

class LoginController 
{
    public function create()
    {
        return view('auth/login');
    }
}