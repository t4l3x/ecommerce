<?php

namespace App\Application\Auth\Validators;

use Nuwave\Lighthouse\Validation\Validator;

class LoginValidator extends Validator
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ];
    }
}
