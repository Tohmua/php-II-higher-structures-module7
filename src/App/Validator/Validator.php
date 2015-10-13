<?php

namespace App\Validator;

interface Validator
{
    public function validate($value);

    public function getError();
}