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

    public function __construct($name, ViewHelper $viewHelper)
    {
        $this->name       = $name;
        $this->viewHelper = $viewHelper;
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
        return $this->viewHelper->display();
    }

    public function get()
    {
        return $this->value;
    }

    public function hydrate(array $values)
    {
        $this->checkValueInArray($values);

        $this->value = $values[$this->name];

        $this->applyFilters();

        $this->validate();
    }

    private function checkValueInArray($values)
    {
        if (!in_array($this->name, array_keys($values))) {
            throw new ElementException(
                sprintf(
                    'Value "%s" has not been set',
                    $this->name
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
}