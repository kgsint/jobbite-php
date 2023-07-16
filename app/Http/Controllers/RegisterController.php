<?php 

namespace App\Http\Controllers;

use App\Http\FormRequests\RegisterFormRequest;

class RegisterController
{
    public function create()
    {
        return view('auth/register');
    }

    public function store()
    {
        RegisterFormRequest::validate($_POST);

        dd($_POST);
    }
}