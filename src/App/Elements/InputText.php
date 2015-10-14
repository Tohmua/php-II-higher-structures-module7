<?php

namespace App\Elements;

use App\Elements\Element;

class InputText extends Element
{
    public function setId($id)
    {
        $this->setProperty('id', $id);
        return $this;
    }

    public function setClass($class)
    {
        $this->setProperty('class', $class);
        return $this;
    }

    public function setName($name)
    {
        $this->setProperty('name', $name);
        return $this;
    }

    public function setValue($value)
    {
        $this->setProperty('value', $value);
        return $this;
    }
}
