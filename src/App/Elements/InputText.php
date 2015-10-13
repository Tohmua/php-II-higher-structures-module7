<?php

namespace App\Elements;

use App\Elements\Element;

class InputText extends Element
{
    public function addName($name)
    {
        $this->viewHelper->setName($name);
        return $this;
    }

    public function addId($id)
    {
        $this->viewHelper->setId($id);
        return $this;
    }

    public function addClass($class)
    {
        $this->viewHelper->setClass($class);
        return $this;
    }
}
