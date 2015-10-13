<?php

namespace App\ViewHelpers;

abstract class ViewHelper
{
    protected $field;

    public function __toString()
    {
        return $this->field;
    }
}