<?php

namespace App\ViewHelpers;

use App\ViewHelpers\ViewHelper;

class InputRadio extends ViewHelper
{
    public function __construct($name = '', array $values = [], $checkedValue = '')
    {
        $inputs = array_map(function($value) use ($name, $checkedValue) {
            return sprintf(
                '<input type="radio" name="%s" value="%s"%s />',
                $name,
                $value,
                $value == $checkedValue ? ' checked' : ''
            );
        }, $values);

        $this->field = implode(PHP_EOL, $inputs);
    }
}
