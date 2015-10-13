<?php

namespace App\ViewHelpers;

use App\ViewHelpers\ViewHelper;

class InputRadio extends ViewHelper
{
    private $name         = '';
    private $values       = [];
    private $checkedValue = '';

    public function __construct($name = '', array $values = [], $checkedValue = '')
    {
        $this->setName($name)
             ->setValues($values)
             ->setCheckedValue($checkedValue);
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setValues(array $values)
    {
        $this->values = $values;
        return $this;
    }

    public function setCheckedValue($checkedValue)
    {
        $this->checkedValue = $checkedValue;
        return $this;
    }

    public function display()
    {
        $inputs = array_map(function($value) {
            return sprintf(
                '<input type="radio" name="%s" value="%s"%s />',
                $this->name,
                $value,
                $value == $this->checkedValue ? ' checked' : ''
            );
        }, $this->values);

        return implode(PHP_EOL, $inputs);
    }
}
