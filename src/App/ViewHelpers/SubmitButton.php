<?php

namespace App\ViewHelpers;

use App\ViewHelpers\ViewHelper;

class SubmitButton implements ViewHelper
{
    public function display(array $properties)
    {
        return sprintf(
            '<input type="submit" name="%s" value="%s" id="%s" class="%s" />',
            isset($properties['name']) ? $properties['name'] : '',
            isset($properties['value']) ? $properties['value'] : '',
            isset($properties['id']) ? $properties['id'] : '',
            isset($properties['class']) ? $properties['class'] : ''
        );
    }
}
