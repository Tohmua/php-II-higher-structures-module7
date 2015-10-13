<?php

namespace App\ViewHelpers;

use App\ViewHelpers\ViewHelper;

class InputButton extends ViewHelper
{
    private $name  = '';
    private $value = '';
    private $id    = '';
    private $class = '';

    public function __construct($name = '', $value = '', $id = '', $class = '')
    {
        $this->setName($name)
             ->setValue($value)
             ->setId($id)
             ->setClass($class);
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setClass($class)
    {
        $this->class = $class;
        return $this;
    }

    public function display()
    {
        return sprintf(
            '<input type="button" name="%s" value="%s" id="%s" class="%s" />',
            $this->name,
            $this->value,
            $this->id,
            $this->class
        );
    }
}
