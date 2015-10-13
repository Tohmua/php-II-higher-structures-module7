<?php

namespace App\Validator;

use App\Validator\Validator;

class EmailValidator implements Validator
{
    public function validate($email)
    {
        return !filter_var($email, FILTER_VALIDATE_EMAIL) ? false : true;
    }
}
