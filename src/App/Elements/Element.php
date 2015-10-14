<?php

namespace App\Elements;

use App\Elements\ElementException;
use App\Filter\Filter;
use App\Validator\Validator;
use App\ViewHelpers\ViewHelper;

abstract class Element
{
    protected $viewHelper;
    private $validators = [];
    private $filters    = [];
    private $name       = '';
    private $value      = '';
    private $properties = [];

    public function __construct($name, ViewHelper $viewHelper)
    {
        $this->setProperty('name', $name);
        $this->viewHelper = $viewHelper;
    }

    public function setProperty($property, $value)
    {
        $this->properties[$property] = $value;
        return $this;
    }

    public function addValidator(Validator $validator)
    {
        $this->validators[] = $validator;
    }

    public function addFilter(Filter $filter)
    {
        $this->filters[] = $filter;
    }

    public function display()
    {
        return $this->viewHelper->display($this->properties);
    }

    public function get()
    {
        return $this->value;
    }

    public function hydrate(array $values)
    {
        $this->checkValueInArray($values);

        $this->value = $values[$this->getName()];

        $this->applyFilters();

        $this->validate();

        $this->setProperty('value', $this->value);
    }

    private function checkValueInArray($values)
    {
        if (!in_array($this->getName(), array_keys($values))) {
            throw new ElementException(
                sprintf(
                    'Value "%s" has not been set',
                    $this->getName()
                )
            );
        }
    }

    private function applyFilters()
    {
        foreach ($this->filters as $filter) {
            $this->value = $filter->filter($this->value);
        }
    }

    private function validate()
    {
        $errors = [];

        foreach ($this->validators as $validator) {
            if (!$validator->validate($this->value)) {
                $errors[] = $validator->getError();
            }
        }

        if (!empty($errors)) {
            throw new ElementException(implode(PHP_EOL, $errors));
        }
    }

    private function getName()
    {
        return isset($this->properties['name']) ? $this->properties['name'] : null;
    }
}