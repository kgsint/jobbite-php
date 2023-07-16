<?php 

namespace App\Http\FormRequests;

use App\Exceptions\ValidationException;

class FormRequest 
{
    protected array $errors = [];

    
    // constructor property promotion
    public function __construct(protected array $attributes) // attributes from form requests .i.e $_POST
    {
        //
    }

    // to check errors
    public function hasErrors()
    {
        return (bool) count($this->errors);
    }

    // throw validation exception and catch and pass errors and old vlaues to $_SESSION['_flash']
    public function throw()
    {
        ValidationException::throw($this->errors, $this->attributes); 
    }

    public function setError(string $key, string $value)
    {
        $this->errors[$key] = $value;

        return $this; // for method chaining
    }
}