<?php

namespace App\Validator;

use App\Validator\Validator;

class IntegerValidator implements Validator
{
    public function validate($value)
    {
        return is_int($value);
    }

    public function getError()
    {
        return EmailValidator::class . ' failed';
    }
}
