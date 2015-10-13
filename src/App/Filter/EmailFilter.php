<?php

namespace App\Filter;

use App\Filter\Filter;

class EmailFilter implements Filter
{
    public function filter($email)
    {
        return filter_var($email, FILTER_SANITIZE_EMAIL);
    }
}
