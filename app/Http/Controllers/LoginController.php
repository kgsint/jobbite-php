<?php 

namespace App\Http\Controllers;

use App\Http\FormRequests\LoginFormRequest;
use Core\Authenticator;

class LoginController 
{
    public function create()
    {
        return view('auth/login');
    }

    // authenticate
    public function store()
    {
        $request = LoginFormRequest::validate($_POST);

        if(!(new Authenticator)->attempt($_POST['email'], $_POST['password'])) {
            $request->setError('email', 'The given credentials do no match our records')->throw();
        }

        redirect('/');
        exit;
    }

    // logout and clear sessions
    public function logout()
    {
        $_SESSION = [];
        
        unset($_SESSION['user']);
        
        $params = session_get_cookie_params();
        setcookie('PHPSESSID', "", time() - 1, $params['path'], $params['domain']);
        
        redirect('/');
        exit;
    }
}