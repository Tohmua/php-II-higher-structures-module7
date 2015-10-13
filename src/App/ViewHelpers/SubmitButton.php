<?php

namespace App\ViewHelpers;

use App\ViewHelpers\ViewHelper;

class SubmitButton extends ViewHelper
{
    public function __construct($name = '', $value = '', $id = '', $class = '')
    {
        $this->field = sprintf(
            '<input type="submit" name="%s" value="%s" id="%s" class="%s" />',
            $name,
            $value,
            $id,
            $class
        );
    }
}
