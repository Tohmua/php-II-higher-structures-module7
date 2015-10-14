<?php

namespace App\Elements;

use App\ViewHelpers\ViewHelper;

class ElementFactory
{
    static function make($field, $name, ViewHelper $viewHelper = null)
    {
        $element = 'App\\Elements\\' . $field;

        if (!class_exists($element)) {
            throw new ElementException('Class ' . $element . ' does not exist.');
        }

        if (is_null($viewHelper)) {
            $viewHelper = !is_null($viewHelper) ?: 'App\\ViewHelpers\\' . $field;

            if (!class_exists($viewHelper)) {
                throw new ElementException('Class ' . $viewHelper . ' does not exist.');
            }

            $viewHelper = new $viewHelper();
        }

        return new $element($name, $viewHelper);
    }
}