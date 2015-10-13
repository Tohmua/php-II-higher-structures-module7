<?php

namespace App\Validator;

use App\Validator\Validator;

class StringValidator implements Validator
{
    public function validate($value)
    {
        return is_string($value);
    }

    public function getError()
    {
        return EmailValidator::class . ' failed';
    }
}
