<?php

namespace App\ViewHelpers;

use App\ViewHelpers\ViewHelper;

class InputText implements ViewHelper
{
    public function display(array $properties)
    {
        return sprintf(
            '<input type="text" name="%s" id="%s" class="%s" value="%s" />',
            isset($properties['name']) ? $properties['name'] : '',
            isset($properties['id']) ? $properties['id'] : '',
            isset($properties['class']) ? $properties['class'] : '',
            isset($properties['value']) ? $properties['value'] : ''
        );
    }
}
