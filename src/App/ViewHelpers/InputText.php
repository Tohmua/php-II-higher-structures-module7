<?php

namespace App\ViewHelpers;

use App\ViewHelpers\ViewHelper;

class InputText extends ViewHelper
{
    private $name  = '';
    private $id    = '';
    private $class = '';

    public function __construct($name = '', $id = '', $class = '')
    {
        $this->setName($name)
             ->setId($id)
             ->setClass($class);
    }

    public function setName($name)
    {
        $this->name = $name;
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
            '<input type="text" name="%s" id="%s" class="%s" />',
            $this->name,
            $this->id,
            $this->class
        );
    }
}
