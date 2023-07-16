<?php 

namespace App\Http\FormRequests;

use Core\Validator;

class RegisterFormRequest extends FormRequest
{
    // constructor property promotion
    public function __construct(protected array $attributes)
    {
        parent::__construct($attributes);

        // custom validations
        if(Validator::required($attributes['name'])) {
            $this->errors['name'] = 'Name cannot be empty';
        }

        if(Validator::unique('users', 'email', $attributes['email'])) {
            $this->errors['email'] = 'Email has aleady been taken';
        }

        if(!Validator::email($attributes['email'])) {
            $this->errors['email'] = 'Please provide a valid email address';
        }

        if(Validator::required($attributes['password'], 7)) {
            $this->errors['password'] = 'Password should be at least 7 characters';
        }

        if(!Validator::confirm($attributes['password'], $attributes['confirm_password'])) {
            $this->errors['password'] = 'Password confirmation do not match';
        }

    }

    public static function validate(array $attributes)
    {
        $instance = new static($attributes); // instantiate

        if($instance->hasErrors()) {
            $instance->throw();
        }

        return $instance; // method chaining

    }
}