<?php

namespace App\Elements;

class ElementFactory
{
    static function make($field, $viewHelper = null)
    {
        $element = 'App\\Elements\\' . $field;
        $viewHelper = !is_null($viewHelper) ?: 'App\\ViewHelpers\\' . $field;

        if (!class_exists($element)) {
            throw new ElementException('Class ' . $element . ' does not exist.');
        }

        if (!class_exists($viewHelper)) {
            throw new ElementException('Class ' . $viewHelper . ' does not exist.');
        }

        return new $element('Test', new $viewHelper());
    }
}