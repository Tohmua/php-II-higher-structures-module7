<?php

namespace App\ViewHelpers;

abstract class ViewHelper
{
    protected $field;

    abstract public function display();
}