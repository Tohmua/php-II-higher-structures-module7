<?php

namespace FormDemo;

use App\Elements\ElementFactory;
use App\FormBuilder\Form;

require_once __DIR__ . '/../vendor/autoload.php';

$form = new Form();

$element = ElementFactory::make('InputText');

$element->addName('First Name')
        ->addId('firstName');

$element->addValidator(
    new \App\Validator\StringValidator()
);
$element->addFilter(
    new \App\Filter\WordFilter()
);

$form->addElement($element);

include __DIR__ . '/templates/form.phtml';
