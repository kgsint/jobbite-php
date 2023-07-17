<?php 

namespace App\Http\Middleware;

use App\Http\Middleware\Auth;
use App\Http\Middleware\Guest;
use App\Exceptions\MiddlewareNotFoundException;

class Middleware 
{
    const MAP = [
        'auth' => Auth::class,
        'guest' => Guest::class,
    ];

    public static function resolve(?string $key)
    {
        if(!$key) {
            return;
        }

        $middleware = self::MAP[$key] ?? false;

        if(!$middleware) {
            throw new \Exception("Middle not found for key {$key}");
        }

        (new $middleware)->handle();
    }
}