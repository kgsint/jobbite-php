<?php 

namespace App\Exceptions;

class ValidationException extends \Exception 
{
    public readonly array $old;
    public readonly array $errors;

    // throw exception and store in instance to pass to $_SESSION['_flash'] to flash error message and old value
    public static function throw($errors, $old)
    {
        $instance = new static; // instantiate

        // store in properties to pass down to $_SESSION variable
        $instance->errors = $errors;
        $instance->old = $old;

        throw $instance;
    }
}