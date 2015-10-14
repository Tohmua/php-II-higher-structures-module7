<?php

namespace App\ViewHelpers;

use App\ViewHelpers\ViewHelper;

class InputRadio implements ViewHelper
{
    public function display(array $properties)
    {
        $inputs = [];

        if (isset($properties['values'])) {
            $inputs = array_map(function($value) use ($properties) {
                $checked = (isset($properties['value']) && $properties['value'] == $value ? ' checked' : '');

                return sprintf(
                    '<input type="radio" name="%s" value="%s"%s />',
                    isset($properties['name']) ? $properties['name'] : '',
                    $value,
                    $checked
                );
            }, $properties['values']);
        }

        return implode(PHP_EOL, $inputs);
    }
}
