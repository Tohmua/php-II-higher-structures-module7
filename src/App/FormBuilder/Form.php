<?php

namespace App\FormBuilder;

use App\Elements\Element;
use App\Elements\ElementException;
use App\FormBuilder\FormException;

class Form
{
    private $elements = [];

    public function addElement(Element $element)
    {
        $this->elements[] = $element;
    }

    public function elements()
    {
        return $this->elements;
    }

    public function hydrate($values)
    {
        try {
            foreach ($this->elements() as $element) {
                $element->hydrate($values);
            }
        } catch (ElementException $e) {
            throw new FormException($e->getMessage());
        }
    }
}
