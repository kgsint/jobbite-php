<?php 

namespace Core;

use Core\Database\MySQL;
use Core\Database\Tables\UsersTable;

class Authenticator 
{
    public function attempt(string $email, string $password) :bool
    {
        // find user by email
        $user = (new UsersTable(new MySQL))->findByEmail($email);

        // check and return true or false based on that
        if($user && password_verify($password, $user->password)){
            // login
            $this->login($user);

            return true;
        }

        return false;
    }

    private function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user->email
        ];

        // regenerate session to prevent from xss attack
        session_regenerate_id(true);
    }
}