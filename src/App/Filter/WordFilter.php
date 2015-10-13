<?php

namespace App\Filter;

use App\Filter\Filter;

class WordFilter implements Filter
{
    public function filter($string)
    {
        return preg_replace('/\W\s/', '', $string);
    }
}
