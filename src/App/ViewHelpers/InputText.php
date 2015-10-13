<?php

namespace App\ViewHelpers;

use App\ViewHelpers\ViewHelper;

class InputText extends ViewHelper
{
    public function __construct($name = '', $id = '', $class = '')
    {
        $this->field = sprintf(
            '<input type="text" name="%s" id="%s" class="%s" />',
            $name,
            $id,
            $class
        );
    }
}
