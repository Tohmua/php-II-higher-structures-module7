<?php

namespace App\Elements;

use App\Elements\Element;

class SubmitButton extends Element
{
    public function setValue($value)
    {
        $this->setProperty('value', $value);
        return $this;
    }
}
