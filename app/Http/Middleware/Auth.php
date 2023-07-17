<?php 

namespace App\Http\Middleware;

class Auth 
{
    public function handle()
    {
        if(empty($_SESSION['user'])) {
            redirect('/');
            exit;
        }
    }
}