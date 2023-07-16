<?php 

namespace App\Http\Controllers;

use Core\Database\MySQL;
use Core\Database\Tables\UsersTable;
use App\Http\FormRequests\RegisterFormRequest;
use Core\Authenticator;

class RegisterController
{
    public function create()
    {
        return view('auth/register');
    }

    public function store()
    {
        RegisterFormRequest::validate($_POST);

        $table = new UsersTable(new MySQL());

        $table->insert([
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),   
        ]);
        
        // login using the registered accouont
        (new Authenticator)->attempt($_POST['email'], $_POST['password']);

        return redirect('/');
    }
}