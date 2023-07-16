<?php 

namespace App\Http\FormRequests;

use Core\Validator;

class LoginFormRequest extends FormRequest
{
    public function __construct(protected array $attributes)
    {
        parent::__construct($attributes);

        // validations
        if(!Validator::email($attributes['email'])) {
            $this->errors['email'] = "Please provide a valid email address";
        }

        if(Validator::required($attributes['password'])) {
            $this->errors['password'] = "Password cannot be empty";
        }
    }

    public static function validate(array $attributes)
    {
        // instantiate
        $instance = new static($attributes);

        if($instance->hasErrors()) {
            $instance->throw();
        }

        // provide object or class instance if the validation was successful
        return $instance;
    }
}