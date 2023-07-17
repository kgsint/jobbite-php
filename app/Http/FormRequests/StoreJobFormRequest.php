<?php 

namespace App\Http\FormRequests;

use Core\Validator;

class StoreJobFormRequest extends FormRequest
{
    public function __construct(protected array $attributes)
    {
        parent::__construct($attributes);

        // validations
        if(Validator::required($attributes['title'])) {
            $this->errors['title'] = 'Title cannot be empty';
        }

        if(Validator::required($attributes['location'])) {
            $this->errors['location'] = 'Location cannot be empty';
        }

        if(Validator::required($attributes['job_status'])) {
            $this->errors['job_status'] = 'Please select job type';
        }

        if(Validator::required($attributes['salary_from'])) {
            $this->errors['salary_from'] = 'Salary Range cannot be empty';
        }

        if(Validator::required($attributes['salary_to'])) {
            $this->errors['salary_to'] = 'Salary Range cannot be empty';
        }

        if(Validator::required($attributes['description'])) {
            $this->errors['description'] = 'Description cannot be empty';
        }

        if(Validator::required($attributes['company_name'])) {
            $this->errors['company_name'] = 'Company name cannot be empty';
        }

        if(Validator::required($attributes['company_email'])) {
            $this->errors['company_email'] = 'Company email cannot be empty';
        }

        if(!Validator::url($attributes['apply_url'])) {
            $this->errors['apply_url'] = 'Please provide a valid url';
        }
    }

    public static function validate(array $attributes)
    {
        $instance = new static($attributes);

        if($instance->hasErrors()) {
            $instance->throw();
        }

        return $instance;
    }
}